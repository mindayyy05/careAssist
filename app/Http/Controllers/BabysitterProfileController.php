<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabysitterReview;

class BabysitterProfileController extends Controller
{
    public function showProfile()
    {
        // Fetch all reviews for the single babysitter
        $reviews = BabysitterReview::all();

        // Pass the reviews to the view
        return view('babysitterprofile', compact('reviews'));
    }
}
