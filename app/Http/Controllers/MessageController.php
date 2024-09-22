<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure this is imported

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Save the message to the database
        Chat::create([
            'user_id' => Auth::id(), // Using Auth::id() to get the ID of the logged-in user
            'message' => $request->input('message'),
            'who_sent' => 'user', // Since this is from the user's side
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        // Fetch messages from the 'chats' table for the authenticated user
        $messages = Chat::where('user_id', Auth::id())->get(); // Using Auth::id()

        return view('message', compact('messages'));
    }
}
