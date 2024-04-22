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
                $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">
                    <span class="svg-icon svg-icon-3" style="margin-right:0px;">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path
                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                            fill="black" />
                        <path opacity="0.5"
                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                            fill="black" />
                        <path opacity="0.5"
                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                            fill="black" />
                    </svg>
                    </span>
                </a>';
                return $actionBtn;
            })
            ->rawColumns(['action','driver'])
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
