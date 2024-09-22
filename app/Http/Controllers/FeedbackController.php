<?php

namespace App\Http\Controllers;

use App\Models\CaretakerFeedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string',
        ]);

        // Create a new feedback entry in the database
        CaretakerFeedback::create([
            'name' => $request->input('name'),
            'feedback' => $request->input('feedback'),
        ]);

        // Optionally redirect with a success message
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
