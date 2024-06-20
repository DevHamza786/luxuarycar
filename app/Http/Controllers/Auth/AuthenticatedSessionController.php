<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // If authentication is successful, update the location
        $this->updateUserLocation($request);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            return response()->json(['success' => true, 'message' => 'Login successful', 'user' => $user]);
        } else {
            // Authentication failed
            return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
        }
    }

    protected function updateUserLocation($request)
    {
        // Make a request to the Google Maps Geolocation API to get the location based on the IP address
        $client = new Client();
        $response = $client->post('https://www.googleapis.com/geolocation/v1/geolocate?key=' . env('GOOGLE_MAP_KEY'), [
            'json' => ['considerIp' => true],
        ]);

        // Decode the response
        $location = json_decode($response->getBody(), true);

        // Assuming you have a User model
        $user = User::where('email',$request->email)->first();
        // Update the location of the user
        $user->latitude = $location['location']['lat'];
        $user->longitude = $location['location']['lng'];
        $user->save();
    }
}
