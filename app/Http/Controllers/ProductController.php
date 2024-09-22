<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInfo; // Make sure to use the correct model

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_quantity' => 'required|integer|min:0',
        ]);

        // Create a new product entry
        ProductInfo::create([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'quantity' => $request->product_quantity,
        ]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
