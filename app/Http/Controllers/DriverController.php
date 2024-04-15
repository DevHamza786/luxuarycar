<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        $pagePrefix = 'driver';

        $user = Auth::user();
        $drivers = User::role('driver')->withCount('bookings')->get();

        return view('driver.index', compact('drivers', 'pagePrefix'));
    }
}
