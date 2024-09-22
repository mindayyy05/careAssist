<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MentalHealthProvider;

class TherapistLoginController extends Controller
{
    public function create()
    {
        return view('provider_login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:mental_health_providers,email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'This email does not exist in our records.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        $provider = MentalHealthProvider::where('email', $request->email)->first();

        if (!$provider || !Hash::check($request->password, $provider->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput($request->only('email'));
        }

        Auth::guard('mental_health_provider')->login($provider);

        return redirect()->route('provider_dashboard');
    }

    public function showLoginForm()
    {
        return view('provider_login'); // Adjust the view name as needed
    }
}
