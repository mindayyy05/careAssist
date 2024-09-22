<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SupplierRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('supplier_registration');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shop_name' => 'required|string|max:255',
            'email' => 'required|email|unique:supplier_info,email', // Ensure this matches your table name
            'phone_number' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Supplier::create([
            'shop_name' => $request->shop_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'password' => Hash::make($request->password),
        ]);

        // Redirect or return a response after successful registration
        return redirect()->route('supplier_login')->with('success', 'Registration successful. Please log in.');
    }
}
