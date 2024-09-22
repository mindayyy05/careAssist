<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\UserCart;
use App\Models\ProductInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Add this for logging


class ShoppingCartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::id(); // Get the logged-in user's ID
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = ProductInfo::findOrFail($productId);
        $amount = $product->price * $quantity; // Calculate the total amount

        ShoppingCart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'amount' => $amount
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        // Find the cart item by ID and delete it
        $cartItem = UserCart::findOrFail($id);
        $cartItem->delete();

        // Redirect back to the cart page with a success message
        return redirect()->route('shoppingcart')->with('success', 'Item removed from cart.');
    }
}
