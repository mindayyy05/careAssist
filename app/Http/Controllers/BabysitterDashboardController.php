<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabysitterBooking;
use App\Models\BabysitterTodo;
use App\Models\Booking;
use App\Models\Message;
use Illuminate\Support\Facades\DB;  // Import DB facade
use Illuminate\Support\Facades\Log; // Import Log facade
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class BabysitterDashboardController extends Controller
{
    public function showDashboard()
    {
        $bookings = Booking::all(); // or apply filters as needed
        return view('babysitter_dashboard', compact('bookings'));
    }



    public function showProfile()
    {
        try {
            // Retrieve all booked dates since there's only one babysitter
            $bookedDates = DB::table('babysitter_bookings')
                ->pluck('selectedDate')
                ->toArray();

            // Pass data to the view
            return view('babysitterprofile', ['bookedDates' => $bookedDates]);
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to retrieve data'], 500);
        }
    }




    public function updateStatus(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'todo_id' => 'required|integer',
                'status_column' => 'required|string'
            ]);

            // Retrieve the ToDo item
            $todo = BabysitterTodo::find($request->input('todo_id'));

            if ($todo) {
                // Update the status column
                $todo->{$request->input('status_column')} = 'done';
                $todo->save();

                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'ToDo item not found'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error updating status: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Unable to update status'], 500);
        }
    }
}
