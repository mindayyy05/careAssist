<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabysitterBooking;
use App\Models\BabysitterFeedback;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class BabysitterBookingController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'selectedDate' => 'required|string',
    //         'number_of_kids' => 'required|integer|min:1|max:5',
    //         'kid_names' => 'required|regex:/^[a-zA-Z\s]+$/',
    //         'allergies' => 'required|regex:/^[a-zA-Z\s]+$/',
    //         'disabilities' => 'required|regex:/^[a-zA-Z\s]+$/',
    //         'timing_start' => 'required|date_format:H:i',
    //         'timing_end' => 'required|date_format:H:i',
    //         'your_name' => 'required|regex:/^[a-zA-Z\s]+$/',
    //         'phone_number' => 'required|numeric|digits:10',
    //         'house_address' => 'required|string',
    //     ]);

    //     BabysitterBooking::create([
    //         'user_id' => $request->user_id,
    //         'selectedDate' => $request->selectedDate,
    //         'number_of_kids' => $request->number_of_kids,
    //         'kid_names' => $request->kid_names,
    //         'allergies' => $request->allergies,
    //         'disabilities' => $request->disabilities,
    //         'timing_start' => $request->timing_start,
    //         'timing_end' => $request->timing_end,
    //         'your_name' => $request->your_name,
    //         'phone_number' => $request->phone_number,
    //         'house_address' => $request->house_address,
    //     ]);

    //     return redirect()->back()->with('success', 'Babysitter has been booked!');
    // }

    // public function index(Request $request)
    // {
    //     $userId = $request->user()->id; // Get the current user's ID
    //     $bookings = BabysitterBooking::where('user_id', $userId)->get();

    //     return view('bookings.index', compact('bookings'));
    // }

    // public function accept($id)
    // {
    //     $booking = BabysitterBooking::find($id);
    //     if ($booking) {
    //         $booking->status = 'accepted';
    //         $booking->save();
    //     }
    //     return redirect()->back()->with('status', 'Booking accepted.');
    // }

    // public function decline($id)
    // {
    //     $booking = BabysitterBooking::find($id);
    //     if ($booking) {
    //         $booking->status = 'declined';
    //         $booking->save();
    //     }
    //     return redirect()->back()->with('status', 'Booking declined.');
    // }

    // public function showBookings(Request $request)
    // {
    //     // Retrieve bookings based on the selected date if provided
    //     $bookings = BabysitterBooking::query();

    //     if ($request->has('selectedDate')) {
    //         $selectedDate = $request->input('selectedDate');
    //         $bookings = $bookings->where('selectedDate', $selectedDate);
    //     }

    //     $bookings = $bookings->get();

    //     // Pass the results to the babysitterprofile view
    //     return view('babysitterprofile', compact('bookings'));
    // }

    // // In your controller method
    // public function showCalendar()
    // {
    //     // Retrieve all feedback records
    //     $feedbacks = BabysitterFeedback::all();

    //     // Retrieve bookings from the database
    //     $bookings = BabysitterBooking::all();


    //     // Assuming 'selectedDate' is just a day number
    //     $bookedDates = $bookings->pluck('selectedDate')->map(function ($day) {
    //         // Provide a default month and year for parsing
    //         try {
    //             return (int) Carbon::parse('2024-08-' . $day)->format('j');
    //         } catch (\Exception $e) {
    //             return null; // Handle parsing errors if any
    //         }
    //     })->filter(); // Remove any null values

    //     // Pass the results to the babysitterprofile view
    //     return view('babysitterprofile', compact('feedbacks', 'bookings', 'bookedDates'));
    // }
    public function showProfile()
    {
        // Retrieve all messages for the current user
        $messages = Message::where('user_id', Auth::id())->get();

        // Retrieve all bookings for the current user (adjust as needed)
        $bookings = BabysitterBooking::where('user_id', Auth::id())->get();

        // Retrieve all feedbacks for the current user (adjust as needed)

        $bookedDates = $bookings->pluck('date');

        // Pass messages, bookings, and feedbacks to the view
        return view('babysitterprofile', [
            'messages' => $messages,
            'bookings' => $bookings,
            'bookedDates' => $bookedDates,

        ]);
    }
}
