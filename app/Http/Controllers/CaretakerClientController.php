<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaretakerClient;
use Illuminate\Support\Facades\Auth;

class CaretakerClientController extends Controller
{
    public function showHireForm()
    {
        // Return your hire caretaker form view
        return view('caretaker_hire_form');
    }

    
    public function submitHireForm(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string',
            'city' => 'required|string',
            'street_number' => 'required|string',
            'house_number' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Check if the user is authenticated
        if (auth()->check()) {
            $customer_id = auth()->user()->id;
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }

        // Save the caretaker client information
        $caretakerClient = new CaretakerClient();
        $caretakerClient->customer_id = $customer_id;
        $caretakerClient->name = $request->name;
        $caretakerClient->age = $request->age;
        $caretakerClient->gender = $request->gender;
        $caretakerClient->city = $request->city;
        $caretakerClient->street_number = $request->street_number;
        $caretakerClient->house_number = $request->house_number;
        $caretakerClient->start_date = $request->start_date;
        $caretakerClient->end_date = $request->end_date;
        $caretakerClient->specific_date = $request->specific_date;
        $caretakerClient->start_time = $request->start_time;
        $caretakerClient->end_time = $request->end_time;
        $caretakerClient->allergies = $request->allergies;
        $caretakerClient->disabilities = $request->disabilities;
        $caretakerClient->extra_notes = $request->extra_notes;
        $caretakerClient->save();

        // Redirect or do something after saving
        return redirect()->route('dashboard')->with('success', 'Caretaker client information saved successfully!'); // Replace 'dashboard' with your route name or URL
    }
}
