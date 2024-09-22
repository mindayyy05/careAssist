<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrderDetail;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class PurchaseOrderController extends Controller
{

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'card_type' => 'required|string',
            'card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
        ]);

        // Create a new PurchaseOrderDetail record
        PurchaseOrderDetail::create([
            'user_id' => Auth::id(), // Get the logged-in user ID
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'house_number' => $request->input('house_number'),
        ]);

        // Redirect or return response
        return redirect()->route('order.success'); // Or any other route
    }

    public function showOrderDetails()
    {
        // Fetch all records from the purchase_order_details table
        $purchaseOrderDetails = PurchaseOrderDetail::all();

        // Pass the records to the view
        return view('supplier_orders', compact('purchaseOrderDetails'));
    }
}
