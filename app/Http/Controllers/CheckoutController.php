<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\UserCart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:20',
            'card_type' => 'required|string|max:20',
            'card_number' => 'required|string|max:20',
            'expiry_date' => 'required|string|max:7',
            'cvv' => 'required|string|max:4',
        ]);



        // Redirect or return a response
        return redirect()->back()->with('success', 'Checkout successful!');
    }
}
