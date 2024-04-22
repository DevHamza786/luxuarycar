<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // User exists, create booking for existing user
            $booking = Booking::create([
                'user_id' => $user->id,
                'time' => $request->time,
                'date' => $request->date,
                'car_category' => $request->car_category,
                'pick_location' => $request->pick_location,
                'pickup_latitude' => $request->pickup_latitude,
                'pickup_longitude' => $request->pickup_longitude,
                'drop_location' => $request->drop_location,
                'dropoff_latitude' => $request->dropoff_latitude,
                'dropoff_longitude' => $request->dropoff_longitude,
                'status' => 'awaiting for driver',
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } else {
            // User does not exist, create new user and booking
            $user = User::create([
                'name' => $request->fname,
                'email' => $request->email,
                'password' => Hash::make($request->email),
            ]);

            $user->assignRole('customer');

            if ($user) {
                $booking = Booking::create([
                    'user_id' => $user->id,
                    'time' => $request->time,
                    'date' => $request->date,
                    'car_category' => $request->car_category,
                    'pick_location' => $request->pick_location,
                    'pickup_latitude' => $request->pickup_latitude,
                    'pickup_longitude' => $request->pickup_longitude,
                    'drop_location' => $request->drop_location,
                    'dropoff_latitude' => $request->dropoff_latitude,
                    'dropoff_longitude' => $request->dropoff_longitude,
                    'status' => 'awaiting for driver',
                ]);

                event(new Registered($user));

                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);
            } else {
                return Redirect::back();
            }
        }
    }
}
