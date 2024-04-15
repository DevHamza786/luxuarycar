<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pagePrefix = 'home';

        // Get the authenticated user
        $user = Auth::user();

        // Check if the authenticated user has the 'admin' role
        if ($user->hasRole('admin')) {
            // Get all users with the 'driver' role
            $drivers = User::role('driver')->get();
        } else {
            // Return an empty collection if the user is not authorized
            $drivers = collect();
        }

        // Pass the drivers data to the dashboard view
        return view('dashboard', compact('drivers' , 'pagePrefix'));
    }

    public function softDelete($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'User soft deleted successfully');

        // Redirect back
        return redirect()->back();

    }
}