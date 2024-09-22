<?php

// app/Http/Controllers/CaretakerBookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaretakerRequest; // Adjust the model name as needed

class CaretakerBookingController extends Controller
{
    public function index()
    {
        // Fetch caretaker requests
        $caretakerRequests = CaretakerRequest::all(); // Adjust as needed

        // Return the view with the data
        return view('caretaker_bookings', compact('caretakerRequests'));
    }
}
