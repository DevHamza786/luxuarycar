<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $pagePrefix = 'users';

        $user = Auth::user();
        $users = User::role('customer')->withCount('userRides')->get();

        return view('users.index', compact('users', 'pagePrefix'));
    }
}
