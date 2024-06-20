<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\LoginHistory;
use App\Models\OTP;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTP;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $user = Auth::user();

        if ($user->hasRole('customer') && $user->status !== 'active') {
            Auth::logout(); // Log the user out

            throw ValidationException::withMessages([
                'email' => 'Your account is not active or blocked by admin.',
            ]);
        }

        // Check if the login is from a different IP address or if there is no previous login history
        $currentIp = $this->ip();
        $previousLogin = LoginHistory::where('user_id', $user->id)->latest()->first();

        if (!$previousLogin || $previousLogin->device_ip !== $currentIp) {
            $otpCode = Str::random(6);
            OTP::create([
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'expiration_time' => Carbon::now()->addMinutes(10),
                'is_used' => false,
            ]);

            // Send OTP to user's email
            Mail::to($user->email)->send(new SendOTP($otpCode));

            // Store user ID in session and log out the user
            session(['otp_user_id' => $user->id]);
            $Loginhistory = LoginHistory::create([
                'user_id' => $user->id,
                'device_ip' => $currentIp,
            ]);
            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'OTP sent to your email. Please verify to login.',
            ])->redirectTo(route('verify-otp'));
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
