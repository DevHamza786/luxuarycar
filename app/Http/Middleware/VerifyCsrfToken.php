<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        '/assgin-driver',
        '/updatepassword',
        '/driver-status',
        '/user-status',
        '/booking-status',
        '/booking/end',
        '/charge',
        'booking-status/{bookingId}'
    ];
}
