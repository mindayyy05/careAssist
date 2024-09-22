<?php

// app/Http/Controllers/ClientDetailsController.php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientDetailsController extends Controller
{
    public function show($clientId)
    {
        $client = Client::findOrFail($clientId);

        return view('client_details', compact('client'));
    }
}
