<?php

// app/Http/Controllers/CaretakerRequestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaretakerRequest;
use Illuminate\Support\Facades\Auth; // Ensure you're using Auth facade

class CaretakerRequestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'allergies' => 'nullable|string|max:255',
            'disabilities' => 'nullable|string|max:255',
            'bathing_times' => 'required|in:once,twice,depending',
            'bathing_method' => 'required|in:wet,dry',
            'breakfast_time' => 'nullable|string|max:255',
            'lunch_time' => 'nullable|string|max:255',
            'dinner_time' => 'nullable|string|max:255',
        ]);

        // Ensure the user is authenticated before proceeding
        if (Auth::check()) {
            // Add the authenticated user's ID to the validated data
            $validated['user_id'] = Auth::id();
        } else {
            // If user is not authenticated, return an error or handle as needed
            return redirect()->back()->with('error', 'You must be logged in to submit a caretaker request.');
        }

        // Create a new CaretakerRequest instance and save it
        CaretakerRequest::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Caretaker request submitted successfully!');
    }

    public function acceptRequest($id)
    {
        $request = CaretakerRequest::find($id);
        $request->status = 'accepted';
        $request->save();

        return back()->with('success', 'Request accepted.');
    }

    public function declineRequest($id)
    {
        $request = CaretakerRequest::find($id);
        $request->status = 'declined';
        $request->save();

        return back()->with('error', 'Request declined.');
    }
}
