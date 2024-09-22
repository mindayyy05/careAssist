<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class BabysitterMessageController extends Controller
{
    public function index()
    {
        // Retrieve all chat messages for the current conversation
        $chats = Chat::whereIn('who_sent', ['user', 'babysitter'])->orderBy('created_at')->get();

        // Retrieve all users to display on the left sidebar
        $users = User::all();

        // Pass the chats and users to the view
        return view('babysitter_message', compact('chats', 'users'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string|max:255'
        ]);

        // Save the chat message
        Chat::create([
            'user_id' => Auth::id(), // Use the authenticated user's ID
            'message' => $request->message,
            'who_sent' => 'babysitter'
        ]);

        // Redirect back to the messages page
        return redirect()->route('babysitter_message.index');
    }

    public function showMessages()
    {
        $users = User::all(); // Fetch all users
        $chats = Chat::where('user_id', Auth::id())->get(); // Fetch initial chats for the authenticated user
        return view('babysitter_message', compact('users', 'chats'));
    }
}
