<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\MentalHealthProvider;

class TherapistRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('provider_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'agency_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:mental_health_providers',
            'password' => 'required|string|confirmed|min:8',
        ]);

        MentalHealthProvider::create([
            'name' => $request->name,
            'agency_name' => $request->agency_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('provider_login')->with('success', 'Registration successful! Please log in.');
    }
}
