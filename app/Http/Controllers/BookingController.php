<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {

        $pagePrefix = 'booking';

        return view('booking.index', compact('pagePrefix'));
    }

    public function allbookings()
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $booking = Booking::with('userData')
                ->where('user_id', $user->id)
                ->whereNull('deleted_at');
        } elseif ($user->hasRole('driver')) {
            $booking = Booking::with('userData')
                ->where('driver', $user->id)
                ->whereNull('deleted_at');
        } else {
            $booking = Booking::with('userData')
                ->whereNull('deleted_at');
        }

        return DataTables::of($booking)
            ->addColumn('name', function ($row) {
                return $row->userData->name;
            })
            ->addColumn('email', function ($row) {
                return $row->userData->email;
            })
            ->editColumn('driver', function ($row) {
                if (Auth::user()->hasRole('admin')) {
                    // Render dropdown list for admin to select driver
                    $drivers = User::role('driver')->pluck('name', 'id')->toArray();
                    $dropdown = '<select class="form-control fs-8 driver-select">';
                    $dropdown .= '<option value="">Select Driver</option>';
                    foreach ($drivers as $id => $name) {
                        $selected = $row->driver == $id ? 'selected' : '';
                        $dropdown .= '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                    }
                    $dropdown .= '</select>';
                    return $dropdown;
                } else {
                    return isset($row->driver) ? $row->driverData->name : 'N/A';
                }
            })

            ->editColumn('status', function ($row) {
                return ucfirst($row->status);
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="'.route('map.show', ['id' => $row->id]).'" class="delete btn btn-primary btn-sm">
                    <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right:0px !important;"></i>
                    </i>
                    </span>
                </a>';
                $actionBtn .= '&nbsp;&nbsp;<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">
                <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-trash" aria-hidden="true" style="padding-right:0px !important;"></i>
                </span>
            </a>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'driver'])
            ->make(true);
    }

    public function assginDriver(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->booking_id);
            $booking->driver = $request->driver_id;
            $booking->status = 'Driver Assigned';
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Driver assigned successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Failed to assign driver']);
        }
    }

    public function showMap($id)
    {
        $pagePrefix = 'booking';
        $booking = Booking::find($id);
        $pickupLocation = ['lat' => $booking->pickup_latitude, 'lng' => $booking->pickup_longitude];
        $dropoffLocation = ['lat' => $booking->dropoff_latitude, 'lng' => $booking->dropoff_longitude];

        return view('booking.map', compact('pickupLocation', 'dropoffLocation' , 'pagePrefix'));
    }

    public function softDelete($id)
    {
        // Find the user by ID
        $user = Booking::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'Booking is deleted successfully');

        // Redirect back
        return redirect()->back();
    }
}
