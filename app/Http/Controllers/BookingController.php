<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Report;
use App\Models\BabysitterReview; // Include the model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    // Save all form data when "Confirm Booking" is clicked
    public function confirmBooking(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'bookingDate' => 'required|date|after_or_equal:today',
            'bookingTime' => 'required|date_format:H:i',
            'childName' => 'nullable|string',
            'childAge' => 'nullable|integer|min:0',
            'gender' => 'nullable|in:male,female,other',
            'houseAddress' => 'nullable|string',
            'feedingType' => 'nullable|array',
            'feedingTime' => 'nullable|date_format:H:i',
            'feedingDetails' => 'nullable|string',
            'feedingTime2' => 'nullable|date_format:H:i',
            'feedingDetails2' => 'nullable|string',
            'feedingTime3' => 'nullable|date_format:H:i',
            'feedingDetails3' => 'nullable|string',
            'feedingTime4' => 'nullable|date_format:H:i',
            'feedingDetails4' => 'nullable|string',
            'allergies' => 'nullable|string',
            'specialFoodInstructions' => 'nullable|string',
            'morningWakeUpTime' => 'nullable|date_format:H:i',
            'nightSleepingTime' => 'nullable|date_format:H:i',
            'napTiming' => 'nullable|date_format:H:i',
            'napDetails' => 'nullable|string',
            'napTiming2' => 'nullable|date_format:H:i',
            'napDetails2' => 'nullable|string',
            'napTiming3' => 'nullable|date_format:H:i',
            'napDetails3' => 'nullable|string',
            'sleepingPreferences' => 'nullable|string',
            'comfortItems' => 'nullable|string',
            'specificRoutines' => 'nullable|string',
            'whiteNoise' => 'nullable|in:yes,no',
            'taskDescription' => 'nullable|string',
            'taskTime' => 'nullable|date_format:H:i',
            'taskDescription2' => 'nullable|string',
            'taskTime2' => 'nullable|date_format:H:i',
            'taskDescription3' => 'nullable|string',
            'taskTime3' => 'nullable|date_format:H:i',
            'taskDescription4' => 'nullable|string',
            'taskTime4' => 'nullable|date_format:H:i',
            'taskDescription5' => 'nullable|string',
            'taskTime5' => 'nullable|date_format:H:i',
            'screenTimeStart1' => 'nullable|date_format:H:i',
            'screenTimeEnd1' => 'nullable|date_format:H:i',
            'screenTimeStart2' => 'nullable|date_format:H:i',
            'screenTimeEnd2' => 'nullable|date_format:H:i',
            'screen_time_rules' => 'nullable|string',
            'screen_time_items' => 'nullable|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create and save the booking if validation passes
        $booking = new Booking($request->all());
        $booking->user_id = Auth::id(); // Set user ID of logged-in user
        $booking->babysitter_id = 1; // Babysitter ID is always 1
        $booking->save();

        return redirect()->back()->with('success', 'Booking confirmed successfully!');
    }




    // Save feeding schedule
    public function saveFeedingSchedule(Request $request)
    {
        $booking = Booking::where('user_id', Auth::id())->firstOrCreate([
            'user_id' => Auth::id(),
            'babysitter_id' => 1
        ]);

        $booking->feedingTime = $request->input('feedingTime');
        $booking->feedingDetails = $request->input('feedingDetails');
        $booking->save();

        return redirect()->back()->with('success', 'Feeding schedule saved successfully!');
    }

    // Save nap schedule
    public function saveNapSchedule(Request $request)
    {
        $booking = Booking::where('user_id', Auth::id())->firstOrCreate([
            'user_id' => Auth::id(),
            'babysitter_id' => 1
        ]);

        $booking->napTiming = $request->input('napTiming');
        $booking->napDetails = $request->input('napDetails');
        $booking->save();

        return redirect()->back()->with('success', 'Nap schedule saved successfully!');
    }

    public function getBookingDetails($id)
    {
        $booking = Booking::find($id);
        return response()->json($booking);
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = $request->status;
            $booking->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function declined()
    {
        // Retrieve all declined bookings (assuming there is a status field for this purpose)
        $declinedBookings = Booking::where('status', 'declined')->get();

        // Pass the declined bookings data to the view
        return view('declinedbookings', compact('declinedBookings'));
    }

    public function acceptedBookings()
    {
        // Fetch accepted bookings from the database
        $acceptedBookings = Booking::where('status', 'accepted')->get();

        // Pass the accepted bookings to the view
        return view('acceptedbookings', compact('acceptedBookings'));
    }

    public function markAsDone($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->completed_status = 'completed'; // Update the status to 'completed'
            $booking->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function showUserDashboard()
    {
        // Retrieve all bookings with the necessary information
        $bookings = Booking::select('childName', 'childAge', 'bookingDate', 'bookingTime')->get();

        // Pass the bookings data to the user dashboard view
        return view('userdashboard', compact('bookings'));
    }

    // In BookingController.php
    public function checkDateAvailability(Request $request)
    {
        $date = $request->input('date');
        $isBooked = Booking::whereDate('bookingDate', $date)->exists();
        return response()->json(['isBooked' => $isBooked]);
    }

    // Example in App\Http\Controllers\BabysitterBookingController.php
    public function showProfile()
    {
        // Fetch the reviews from the database
        $reviews = BabysitterReview::all(); // Replace with your actual query to fetch reviews

        // Pass the reviews to the view
        return view('babysitterprofile', compact('reviews'));
    }


    // Store a new review
    public function storeReview(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        // Create and save the review
        BabysitterReview::create($request->all());

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function report(Request $request)
    {
        // Validate the form data
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        // Create a new report
        Report::create([
            'user_id' => Auth::id(), // Assumes user is authenticated
            'reason' => $request->input('reason'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your report has been submitted.');
    }
}
