<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Babysitter;

class BabysitterAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $babysitter = Babysitter::where('email', $request->email)->first();

        if ($babysitter && Hash::check($request->password, $babysitter->password)) {
            Auth::guard('babysitter')->login($babysitter); // Use the babysitter guard
            return redirect()->route('babysitter_dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
