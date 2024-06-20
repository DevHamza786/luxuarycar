<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OTPController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
        ]);

        $userId = session('otp_user_id');

        if (!$userId) {
            return redirect()->route('login')->withErrors(['otp_code' => 'Session expired. Please log in again.']);
        }

        $otp = OTP::where('user_id', $userId)
                  ->where('otp_code', $request->otp_code)
                  ->where('expiration_time', '>', Carbon::now())
                  ->where('is_used', false)
                  ->first();

        if ($otp) {
            $otp->update(['is_used' => true]);

            // Log the user back in
            Auth::loginUsingId($userId);

            // Clear the session
            session()->forget('otp_user_id');

            return redirect()->route('dashboard'); // or wherever you want to redirect
        }

        return redirect()->back()->withErrors(['otp_code' => 'Invalid or expired OTP']);
    }
}
