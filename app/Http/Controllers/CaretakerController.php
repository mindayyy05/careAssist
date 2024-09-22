<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Ensure you have a Feedback model

class CaretakerController extends Controller
{
    public function topCaretaker1()
    {
        $feedbacks = Feedback::all(); // Retrieve all feedbacks
        return view('topcaretaker1', compact('feedbacks'));
    }

    public function topCaretaker2()
    {
        $feedbacks = Feedback::all(); // Retrieve all feedbacks
        return view('topcaretaker2', compact('feedbacks'));
    }
}
