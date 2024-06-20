<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\OTP;
use Illuminate\Support\Str;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CheckDevice
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $currentIp = $request->ip();

            $previousLogin = LoginHistory::where('user_id', $user->id)->latest()->first();

            if ($previousLogin && $previousLogin->device_ip !== $currentIp) {
                $otpCode = Str::random(6);
                OTP::create([
                    'user_id' => $user->id,
                    'otp_code' => $otpCode,
                    'expiration_time' => Carbon::now()->addMinutes(10),
                    'is_used' => false,
                ]);

                // Send OTP to user's email
                Mail::to($user->email)->send(new \App\Mail\SendOTP($otpCode));

                return redirect()->route('verify-otp');
            }

            LoginHistory::create([
                'user_id' => $user->id,
                'device_ip' => $currentIp,
            ]);
        }

        return $next($request);
    }
}
