<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pagePrefix = 'home';
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $booking = Booking::where('user_id',Auth::id())->get();
        }elseif ($user->hasRole('driver')) {
            $booking = Booking::where('driver',Auth::id())->get();
        }
        else{
            $booking = Booking::get();
        }

        return view('dashboard', compact('pagePrefix','booking'));
    }

    public function dashboardBooking()
    {
        $user = Auth::user();
        if ($user->hasRole('customer')) {
            $booking = Booking::with('userData')
                            ->where('user_id', $user->id)
                            ->whereNull('deleted_at')
                            ->latest()
                            ->limit(5);
        } elseif ($user->hasRole('driver')) {
            $booking = Booking::with('userData')
                            ->where('driver', $user->id)
                            ->whereNull('deleted_at')
                            ->latest()
                            ->limit(5);
        } else {
            $booking = Booking::with('userData')
                            ->whereNull('deleted_at')
                            ->latest()
                            ->limit(5);
        }

        return DataTables::of($booking)
            ->addColumn('name', function ($row) {
                return $row->userData->name;
            })
            ->addColumn('email', function ($row) {
                return $row->userData->email;
            })
            ->editColumn('driver', function ($row) {
                return isset($row->driver) ? $row->driverData->name : 'N/A';
            })
            ->editColumn('status', function ($row) {
                return ucfirst($row->status);
            })
            // ->editColumn('created_at', function ($row) {
            //     return \Carbon\Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
            // })
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
            ->rawColumns(['action'])
            ->make(true);
    }

    public function softDelete($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'User soft deleted successfully');

        // Redirect back
        return redirect()->back();
    }
}
