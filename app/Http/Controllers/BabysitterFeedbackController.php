<?php

// app/Http/Controllers/BabysitterFeedbackController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabysitterFeedback;

class BabysitterFeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'review_feedback' => 'required|string',
        ]);

        // Create a new feedback entry
        BabysitterFeedback::create([
            'reviewer_name' => $request->input('reviewer_name'),
            'review_feedback' => $request->input('review_feedback'),
        ]);

        // Redirect or return a response

        return redirect('/babysitterprofile')->with('status', 'Feedback submitted successfully!');
    }
}
