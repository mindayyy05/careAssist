<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TherapistFeedback;
use App\Models\Appointment;

class TherapistFeedbackController extends Controller
{
    public function show()
    {
        // Retrieve all feedback records
        $feedbacks = TherapistFeedback::all(); // Adjust as needed for your data

        // Retrieve all appointments
        $appointments = Appointment::all(); // Adjust as needed for your data

        return view('therapist_profile', ['feedbacks' => $feedbacks, 'appointments' => $appointments]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string',
        ]);

        // Create a new feedback entry
        TherapistFeedback::create([
            'therapist_id' => 1, // Replace with actual therapist ID if needed
            'name' => $request->input('name'),
            'feedback' => $request->input('feedback'),
        ]);

        return response()->json(['success' => true]);
    }
}
