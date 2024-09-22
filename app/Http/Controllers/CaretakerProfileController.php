<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerProfileController extends Controller
{
    public function showProfile()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // Retrieve the currently logged-in caretaker
        $caretaker = Auth::user(); // Assumes caretaker information is stored in the User model

        // Pass the caretaker information to the view
        return view('caretaker_profile', ['caretaker' => $caretaker]);
    }
}
