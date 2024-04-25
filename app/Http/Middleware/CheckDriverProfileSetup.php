<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckDriverProfileSetup
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->hasRole('driver')) {
            if ($user->status != null && $user->status == 'incomplete') {
                return redirect('profile-setup');
            }
        }
        return $next($request);
    }
}
