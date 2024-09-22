<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nic' => ['required', 'regex:/^\d{9}[A-Za-z]$/', 'unique:users'], 
            'age' => ['required', 'integer', 'min:18'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^\d{10,12}$/', 'unique:users'], 
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nic' => $request->nic,
                'age' => $request->age,
                'city' => $request->city,
                'street' => $request->street,
                'house_number' => $request->house_number,
                'phone' => $request->phone,
            ]);

            return redirect('/dashboard')->with('success', 'User registered successfully!');
        } catch (ValidationException $e) {

            if ($e->validator->errors()->has('phone')) {
                return redirect()->back()->withErrors(['phone' => 'Phone number already exists.'])->withInput();
            }
            throw $e;
        }
    }
}
