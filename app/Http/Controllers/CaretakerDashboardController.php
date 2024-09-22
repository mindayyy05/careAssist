<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\CaretakerClient;
use App\Models\CaretakerRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class CaretakerDashboardController extends Controller
{
    public function index()
    {
        // Retrieve the currently authenticated caretaker
        $caretaker = Auth::guard('caretaker')->user();

        // Retrieve clients associated with the authenticated caretaker's ID
        $clients = CaretakerClient::where('caretaker_id', $caretaker->id)->get();

        // Retrieve todos associated with the authenticated caretaker's ID
        $todos = Todo::where('caretaker_id', $caretaker->id)->get();

        return view('caretaker_dashboard', compact('clients', 'todos'));
    }

    public function clientDetails($id)
    {
        // Retrieve the client details
        $client = CaretakerClient::findOrFail($id);

        return view('client_details', compact('client'));
    }

    public function showDashboard()
    {
        // Fetch all caretaker requests from the caretaker_requests table
        $caretakerRequests = CaretakerRequest::all();

        // Pass the data to the view
        return view('caretaker_dashboard', compact('caretakerRequests'));
    }
}
