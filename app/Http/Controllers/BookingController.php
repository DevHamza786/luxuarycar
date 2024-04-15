<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {

        $pagePrefix = 'booking';

        $user = Auth::user();
        $drivers = User::role('driver')->get();

        if ($user->hasRole('customer')) {
            $booking = Booking::with('userData')->where('user_id', $user->id)->whereNull('deleted_at')->get();
        } elseif ($user->hasRole('driver')) {
            $booking = Booking::with('userData')->where('driver', $user->id)->whereNull('deleted_at')->get();
        } else {
            $booking = Booking::with('userData')->whereNull('deleted_at')->get();
        }

        return view('booking.index', compact('booking', 'drivers', 'pagePrefix'));
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
