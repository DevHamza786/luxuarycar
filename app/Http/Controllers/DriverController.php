<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DriverController extends Controller
{
    public function index()
    {
        $pagePrefix = 'driver';

        $user = Auth::user();
        $drivers = User::role('driver')->withCount('bookings')->get();

        return view('driver.index', compact('drivers', 'pagePrefix'));
    }

    public function profileSetup(){

        $user = Auth::user();
        $pagePrefix = 'profileSetup';
        $userStatus = $user->status;
        $phoneNumber = !empty($user->phone);
        $driver = Driver::where('user_id',$user->id)->first();
        $profileCompletionScore = $this->calculateProfileCompletion($userStatus, $phoneNumber);

        return view('driver.profile',compact('user','driver','profileCompletionScore','pagePrefix'));
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find($request->userid);
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
                'active'       => 'online',
            ],
        );

        if ($driveMeta) {
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
}
