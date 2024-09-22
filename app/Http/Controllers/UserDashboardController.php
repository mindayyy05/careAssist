<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HiredCaretaker;
use App\Models\Caretaker;
use App\Models\Todo;
use App\Models\Babysitter;
use App\Models\Booking;
use App\Models\BabysitterBooking;
use App\Models\BabysitterTodo;
use App\Models\CaretakerRequest; // Add this

class UserDashboardController extends Controller
{
    public function showDashboard()
    {
        $userId = Auth::id();

        // Fetch the single babysitter for the user
        $babysitter = Babysitter::first(); // Assuming there’s only one babysitter

        // Fetch any babysitter bookings for the user
        $hiredBabysitters = BabysitterBooking::where('user_id', $userId)->get();

        // Fetch all todos for the user
        $todos = Todo::where('user_id', $userId)->get();

        // Fetch babysitter todos for the user
        $babysitterTodos = BabysitterTodo::where('user_id', $userId)->get();

        // Fetch all caretaker requests for the user
        $caretakerRequests = CaretakerRequest::where('user_id', $userId)->get(); // Fetch only for the logged-in user

        return view('userdashboard_caretaker', [
            'babysitter' => $babysitter,
            'hiredBabysitters' => $hiredBabysitters,
            'todos' => $todos,
            'babysitterTodos' => $babysitterTodos,
            'caretakerRequests' => $caretakerRequests, // Pass caretaker requests to the view
        ]);
    }

    // app/Http/Controllers/UserDashboardController.php

    // app/Http/Controllers/UserDashboardController.php

    // app/Http/Controllers/UserDashboardController.php

    public function showCaretakerBookings()
    {
        $userId = Auth::id(); // Get the logged-in user's ID

        // Fetch caretaker requests for the logged-in user
        $caretakerRequests = CaretakerRequest::where('user_id', $userId)->get();

        // Pass the variable to the view
        return view('caretaker_bookings', [
            'caretakerRequests' => $caretakerRequests,
        ]);
    }




    public function updateTodoList(Request $request)
    {
        $userId = Auth::id();

        // Find the relevant Todo entry for the user
        $todo = Todo::where('user_id', $userId)->first();

        if ($todo) {
            // Update the status for each task
            foreach (range(1, 20) as $i) {
                $taskStatus = $request->input("status_$i");
                if ($taskStatus) {
                    $todo->{"task_${i}_status"} = $taskStatus;
                }
            }
            $todo->save();
        }

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'To-Do list updated successfully!');
    }

    // public function show()
    // {
    //     $user = auth()->user();
    //     $hiredBabysitters = BabysitterBooking::where('user_id', $user->id)->get();
    //     $babysitter = Babysitter::first(); // Assuming only one babysitter

    //     return view('userdashboard', [
    //         'hiredBabysitters' => $hiredBabysitters,
    //         'babysitter' => $babysitter
    //     ]);
    // }

    public function storeTodoList(Request $request)
    {
        $userId = Auth::id();

        // Validate input
        $request->validate([
            'babysitter_booking_id' => 'required|integer',
            'task1' => 'nullable|string|max:255',
            'task2' => 'nullable|string|max:255',
            'task3' => 'nullable|string|max:255',
            'task4' => 'nullable|string|max:255',
            'task5' => 'nullable|string|max:255',
        ]);

        // Store tasks in the database
        \App\Models\BabysitterTodo::create([
            'user_id' => $userId,
            'babysitter_booking_id' => $request->input('babysitter_booking_id'),
            'task1' => $request->input('task1'),
            'task2' => $request->input('task2'),
            'task3' => $request->input('task3'),
            'task4' => $request->input('task4'),
            'task5' => $request->input('task5'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Tasks added successfully!');
    }



    public function index()
    {
        // Fetch bookings from the database
        $bookings = Booking::all(); // Adjust this query according to your needs

        // Pass the $bookings variable to the view
        return view('userdashboard', compact('bookings'));
    }

    public function showUserDashboard()
    {
        // Assuming you have a method to get the babysitter bookings
        $hiredBabysitters = BabysitterBooking::all();
        $babysitterBookingId = $hiredBabysitters->first()->id; // Example, adjust as needed

        return view('userdashboard', [
            'hiredBabysitters' => $hiredBabysitters,
            'babysitterBookingId' => $babysitterBookingId
        ]);
    }

    public function showToDoList($babysitterBookingId)
    {
        $tasks = BabysitterTodo::where('babysitter_booking_id', $babysitterBookingId)->get();
        return view('userdashboard', [
            'tasks' => $tasks,
            'babysitterBookingId' => $babysitterBookingId
        ]);
    }
}
