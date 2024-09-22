<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerRegisterController extends Controller
{
    public function create()
    {
        return view('caretaker_register');
    }

    public function store(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'agency_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:caretakers',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $caretaker = Caretaker::create([
        'name' => $request->name,
        'agency_name' => $request->agency_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::guard('caretaker')->login($caretaker);

    return redirect()->route('caretaker_dashboard')->with('success', 'Caretaker registered successfully');
}
}
