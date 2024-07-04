<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\DriveDoc;
use App\Models\DriverBankDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DriverController extends Controller
{
    public function index()
    {
        $pagePrefix = 'driver';

        return view('driver.index', compact('pagePrefix'));
    }

    public function alldriver(Request $request)
    {
        $drivers = User::role('driver')->With('driverData')->withCount('bookings');

        // Apply search filter if search query is provided
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $drivers->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%')
                    ->orWhereHas('driverData', function ($subQuery) use ($searchValue) {
                        $subQuery->where('category', 'like', '%' . $searchValue . '%');
                    });
            });
        }
        return DataTables::of($drivers)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('phone', function ($row) {
                return $row->phone ?? 'N/A';
            })

            ->addColumn('car_category', function ($row) {
                if ($row->driverData) {
                    return $row->driverData->category;
                } else {
                    return 'N/A';
                }
            })
            ->addColumn('passenger', function ($row) {
                if ($row->driverData) {
                    return $row->driverData->pessenger;
                } else {
                    return 'N/A';
                }
            })
            ->addColumn('bookingCount', function ($row) {
                return $row->bookings_count;
            })
            ->editColumn('status', function ($row) {
                return ucfirst($row->status);
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm show-driver-details"  data-driver-id="' . $row->id . '">
                <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-eye" aria-hidden="true" style="padding-right:0px !important;"></i>
                </i>
                </span>
            </a>';
                $actionBtn .= '&nbsp;&nbsp;<a href="' . route('driver.delete', ['id' => $row->id]) . '" class="delete btn btn-danger btn-sm">
                <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-trash" aria-hidden="true" style="padding-right:0px !important;"></i>
                </span>
            </a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function driverStatus(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $user->update([
            'status' => strtolower($request->status),
        ]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    public function getdriverData($id)
    {
        $driverBankAccount = '';
        $driver = User::with('driverData', 'driverDoc')->findOrFail($id);
        if($driver->driverData){
            $driverID = $driver->driverData->first()->id;
            $driverBankAccount = DriverBankDetail::where('driver_id', $driverID)->first();
        }
        return response()->json([
            'driver' => $driver,
            'bank_account' => $driverBankAccount,
        ]);
    }

    public function profileSetup()
    {

        $user = Auth::user();
        $pagePrefix = 'profileSetup';
        $userStatus = $user->status;
        $phoneNumber = !empty($user->phone);
        $driver = Driver::where('user_id', $user->id)->first();
        $driverDoc = DriveDoc::where('user_id', $user->id)->get();
        if($driver){
            $driverBankAccount = DriverBankDetail::where('driver_id', $driver->id)->first();
        }else{
            $driverBankAccount = '';
        }
        $profileCompletionScore = $this->calculateProfileCompletion($userStatus, $phoneNumber);

        return view('driver.profile', compact('user', 'driver', 'driverDoc', 'profileCompletionScore', 'pagePrefix' , 'driverBankAccount'));
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find($request->userid);
        $path = null;
        if ($request->hasFile('profile')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $path = $request->file('profile')->store('public/profile');
            $user->avatar = str_replace('public/', '', $path);
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $driveMeta = Driver::updateOrCreate(
            [
                'user_id'   => $request->userid,
            ],
            [
                'model'     => $request->get('model'),
                'register_no' => $request->get('register_no'),
                'category'    => $request->get("car_category"),
                'city'   => $request->get('Town'),
                'pessenger'   => $request->get('pessenger'),
                'brand'   => $request->get('brand'),
                'active'       => 'online',
            ],
        );

        if ($driveMeta) {

            $driverBankAccount = DriverBankDetail::updateOrCreate(
                [
                    'driver_id'   => $driveMeta->id,
                ],
                [
                    'account_type'     => $request->get('account_type'),
                    'routing_number' => $request->get('routing_number'),
                    'account_number'    => $request->get("account_number"),
                    'name_on_account'   => $request->get('name_on_account'),
                ],
            );

            if ($request->hasFile('license')) {

                $type = 'license';

                DriveDoc::where('user_id', $request->userid)
                    ->where('type', $type)
                    ->forceDelete();

                foreach ($request->license as $license) {
                    $fileName = $license->getClientOriginalName();

                    $filePath = $license->storeAs('public/' . $type . 's', $fileName);

                    DriveDoc::create([
                        'user_id' => $request->userid,
                        'type' => $type,
                        'path' => $filePath,
                        'name' => $fileName,
                    ]);
                }
            }

            if ($request->hasFile('car')) {

                $type = 'car';

                DriveDoc::where('user_id', $request->userid)
                    ->where('type', $type)
                    ->forceDelete();

                foreach ($request->car as $car) {
                    $fileName = $car->getClientOriginalName();

                    // Store the file in the storage directory
                    $filePath = $car->storeAs('public/' . $type . 's', $fileName);


                    DriveDoc::create([
                        'user_id' => $request->userid,
                        'type' => $type,
                        'path' => $filePath,
                        'name' => $fileName,
                    ]);
                }
            }

            if ($request->hasFile('registration_card')) {

                $type = 'registration_card';

                DriveDoc::where('user_id', $request->userid)
                    ->where('type', $type)
                    ->forceDelete();

                foreach ($request->registration_card as $registration_card) {
                    $fileName = $registration_card->getClientOriginalName();

                    // Store the file in the storage directory
                    $filePath = $registration_card->storeAs('public/' . $type . 's', $fileName);


                    DriveDoc::create([
                        'user_id' => $request->userid,
                        'type' => $type,
                        'path' => $filePath,
                        'name' => $fileName,
                    ]);
                }
            }

            if ($request->hasFile('insurance_card')) {

                $type = 'insurance_card';

                DriveDoc::where('user_id', $request->userid)
                    ->where('type', $type)
                    ->forceDelete();

                foreach ($request->insurance_card as $insurance_card) {
                    $fileName = $insurance_card->getClientOriginalName();

                    // Store the file in the storage directory
                    $filePath = $insurance_card->storeAs('public/' . $type . 's', $fileName);


                    DriveDoc::create([
                        'user_id' => $request->userid,
                        'type' => $type,
                        'path' => $filePath,
                        'name' => $fileName,
                    ]);
                }
            }

            $hasCarDoc = DriveDoc::where('user_id', $request->userid)
                ->where('type', 'car')
                ->exists();

            $hasLicenseDoc = DriveDoc::where('user_id', $request->userid)
                ->where('type', 'license')
                ->exists();

            $hasregistrationCard = DriveDoc::where('user_id', $request->userid)
            ->where('type', 'registration_card')
            ->exists();

            $hasinsuranceCard = DriveDoc::where('user_id', $request->userid)
            ->where('type', 'insurance_card')
            ->exists();

            if ($hasCarDoc && $hasLicenseDoc && $hasregistrationCard && $hasinsuranceCard) {
                $user->status = 'complete';
                $user->save();
            }
            return redirect()->back()->with('success', 'Profile Setup Complete successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    private function calculateProfileCompletion($userStatus, $phoneNumber)
    {
        $score = 0;

        // Check if the email is verified
        if ($phoneNumber) {
            $score += 80; // Add 20 to the score if the email is verified
        } else {
            $score += 40; // Add 60 to the score if the email is not verified
        }

        // Check if a phone number is present
        if ($userStatus == 'complete') {
            $score += 100; // Add 20 to the score if a phone number is present
        }

        // Ensure the score is not greater than 100
        return min($score, 100);
    }

    public function softDelete($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'Driver is deleted successfully');

        // Redirect back
        return redirect()->back();
    }
}
