<?php

// app/Http/Controllers/ProductInfoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInfo;

class ProductInfoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
        ]);

        ProductInfo::create($validated);

        return response()->json(['success' => true]);
    }
}
