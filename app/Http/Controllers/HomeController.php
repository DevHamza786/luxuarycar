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
    public function store(Request $request){
        dd($request->all());

        $user = User::create([
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->email),
        ]);

        $user->assignRole('customer');

        if($user){
            $booking = Booking::create([
                'user_id' => $user->id,
                'time' => $request->time,
                'date' => $request->date,
                'pick_location' => $request->pick_location,
                'drop_location' => $request->drop_location,
                'status' => 'awaiting for driver',
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }else{
            return Redirect::back();
        }
    }
}
