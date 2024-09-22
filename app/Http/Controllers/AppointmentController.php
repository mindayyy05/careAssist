<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\TherapistFeedback;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^\d]+$/', // Ensures the name doesn't contain numbers
            ],
            'user_age' => 'required|integer',
            'user_gender' => 'required|string',
            'appointment_date' => 'required|date',
            'time_slot' => 'required|string',
            'reason_for_therapy' => [
                'required',
                'string',
                'regex:/\D+/', // Ensures the reason is not purely numerical
            ],
        ]);


        // Check if the slot is already booked
        $appointmentExists = Appointment::where('appointment_date', $request->appointment_date)
            ->where('time_slot', $request->time_slot)
            ->exists();

        if ($appointmentExists) {
            return response()->json(['error' => 'Slot already booked'], 400);
        }

        // Save the appointment to the database
        Appointment::create([
            'therapist_id' => 1, // Always set to 1
            'client_id' => Auth::id(), // Get the ID of the currently logged-in user
            'user_name' => $validated['user_name'],
            'user_age' => $validated['user_age'],
            'user_gender' => $validated['user_gender'],
            'appointment_date' => $validated['appointment_date'],
            'time_slot' => $validated['time_slot'],
            'reason_for_therapy' => $validated['reason_for_therapy'],
        ]);

        return response()->json(['success' => true]);
    }

    public function getBookedAppointments()
    {
        // Fetch appointments from the database
        $appointments = Appointment::select('appointment_date', 'time_slot')->get();

        // Pass appointments data to the view
        return view('therapist_profile', ['appointments' => $appointments]);
    }

    public function getBookedAppointmentss()
    {
        // Fetch appointments from the database
        $appointments = Appointment::select('appointment_date', 'time_slot', 'reason_for_therapy', 'user_name', 'user_age', 'status')->get();

        // Pass appointments data to the view
        return view('userdashboard_therapy', ['appointments' => $appointments]);
    }

    public function markAsCompleted($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'completed';
        $appointment->save();

        return response()->json(['success' => true]);
    }
}
