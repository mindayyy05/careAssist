<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Caretaker;

class CaretakerLoginController extends Controller
{
    public function create()
    {
        return view('caretaker_login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:caretakers,email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'This email does not exist in our records.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        $caretaker = Caretaker::where('email', $request->email)->first();

        if (!$caretaker || !Hash::check($request->password, $caretaker->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput($request->only('email'));
        }

        Auth::guard('caretaker')->login($caretaker);

        return redirect()->route('caretaker_dashboard');
    }
}
