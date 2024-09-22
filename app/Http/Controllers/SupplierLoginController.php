<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('supplier')->attempt($credentials)) {
            return redirect()->intended('supplier-dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function showLoginForm()
    {
        return view('supplier-login'); // Return the view for supplier login
    }
}
