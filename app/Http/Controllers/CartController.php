<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCart;

use Illuminate\Support\Facades\Auth; // Import the Auth facade

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric', // Validate the price
        ]);

        $userId = auth()->id(); // Assuming you're using authentication
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $pricePerUnit = $request->input('price'); // Get the price from request

        // Calculate the total amount
        $amount = $quantity * $pricePerUnit;

        // Save the data to the 'usercarts' table
        UserCart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'amount' => $amount,
        ]);

        // Redirect or return a response
        return response()->json(['success' => true]);
    }
    public function showCart()
    {
        $userId = auth()->id(); // Assuming you're using authentication

        // Retrieve cart items for the authenticated user and group by product_id
        $cartItems = UserCart::where('user_id', $userId)
            ->selectRaw('product_id, sum(quantity) as total_quantity, sum(amount) as total_amount')
            ->groupBy('product_id')
            ->get();

        // Define product names and paths
        $products = [
            1 => ['name' => 'Aptamil', 'image' => 'aptamil.jpeg'],
            2 => ['name' => 'Ceralac', 'image' => 'ceralac.jpeg'],
            3 => ['name' => 'Aldo Baby', 'image' => 'aldo_baby.jpeg'],
            4 => ['name' => 'NovoSure', 'image' => 'novosure.jpeg'],
            5 => ['name' => 'Cow & Gate', 'image' => 'cowngate.jpeg'],
            6 => ['name' => 'Pedia Pro', 'image' => 'pediapro.jpeg'],
            7 => ['name' => 'Dexolac', 'image' => 'dexolac.jpeg'],
            8 => ['name' => 'Organic Mamia - Chicken & Vegetable Casserole', 'image' => 'organic_mamia.jpeg'],
            9 => ['name' => 'Organic Mamia - Apple,Sweet Potato,Butternut Squash & Blueberry', 'image' => 'organic2.jpeg'],
            10 => ['name' => 'Organic Mamia - Just Bananas', 'image' => 'organic3.jpeg'],
            11 => ['name' => 'Organic Mamia - Apples,Carrots & Parsnips', 'image' => 'organic4.jpeg'],
            12 => ['name' => 'Organic Mamia - Apples & Strawberries', 'image' => 'organic5.jpeg'],
            13 => ['name' => 'Organic Mamia - Pasta Bolognese', 'image' => 'organic6.jpeg'],
            14 => ['name' => 'Organic Mamia - Prunes', 'image' => 'organic7.jpeg'],
            15 => ['name' => 'Heinz Jar - Beef & Sweet Potato Mash', 'image' => 'jar1.jpeg'],
            16 => ['name' => 'Heinz Jar - Cheesy Tomato Pasta', 'image' => 'jar2.jpeg'],
            17 => ['name' => 'Heinz Jar - Mixed Vegetables', 'image' => 'jar3.jpeg'],
            18 => ['name' => 'Heinz Jar - Creamed Porridge', 'image' => 'jar4.jpeg'],
            19 => ['name' => 'Heinz Jar - Apple & Yoghurt', 'image' => 'jar5.jpeg'],
            20 => ['name' => 'Heinz Jar - Green Beans & Sweet Corn', 'image' => 'jar6.jpeg'],
            21 => ['name' => 'Heinz Jar - Apple Pommes', 'image' => 'jar7.jpeg'],
            22 => ['name' => 'Heinz Pouch - Sweet Potato & Beef Casserole', 'image' => 'heinz1.jpeg'],
            23 => ['name' => 'Heinz Pouch - Sunday Chicken Dinner', 'image' => 'heinz2.jpeg'],
            24 => ['name' => 'Heinz Pouch - Apple & Strawberry', 'image' => 'heinz3.jpeg'],
            25 => ['name' => 'Heinz Pouch - Apple & Blueberries', 'image' => 'heinz4.jpeg'],
            26 => ['name' => 'Heinz Pouch - Potato & Fish Pie', 'image' => 'heinz5.jpeg'],
            27 => ['name' => 'Heinz Pouch - Spaghetti Bolognese', 'image' => 'heinz6.jpeg'],
            28 => ['name' => 'Heinz Pouch - Apple,Spinach,Kiwi & Quinoa', 'image' => 'heinz7.jpeg'],
        ];

        // Pass cart items and product info to the view
        return view('shoppingcart', [
            'cartItems' => $cartItems,
            'products' => $products
        ]);
    }


    public function showCheckout()
    {
        $userId = auth()->id();
        $cartItems = UserCart::where('user_id', $userId)
            ->selectRaw('product_id, sum(quantity) as total_quantity, sum(amount) as total_amount')
            ->groupBy('product_id')
            ->get();

        $products = [
            1 => ['name' => 'Aptamil', 'image' => 'aptamil.jpeg'],
            2 => ['name' => 'Ceralac', 'image' => 'ceralac.jpeg'],
            3 => ['name' => 'Aldo Baby', 'image' => 'aldo_baby.jpeg'],
            4 => ['name' => 'NovoSure', 'image' => 'novosure.jpeg'],
            5 => ['name' => 'Cow & Gate', 'image' => 'cowngate.jpeg'],
            6 => ['name' => 'Pedia Pro', 'image' => 'pediapro.jpeg'],
            7 => ['name' => 'Dexolac', 'image' => 'dexolac.jpeg'],
            8 => ['name' => 'Organic Mamia - Chicken & Vegetable Casserole', 'image' => 'organic_mamia.jpeg'],
            9 => ['name' => 'Organic Mamia - Apple,Sweet Potato,Butternut Squash & Blueberry', 'image' => 'organic2.jpeg'],
            10 => ['name' => 'Organic Mamia - Just Bananas', 'image' => 'organic3.jpeg'],
            11 => ['name' => 'Organic Mamia - Apples,Carrots & Parsnips', 'image' => 'organic4.jpeg'],
            12 => ['name' => 'Organic Mamia - Apples & Strawberries', 'image' => 'organic5.jpeg'],
            13 => ['name' => 'Organic Mamia - Pasta Bolognese', 'image' => 'organic6.jpeg'],
            14 => ['name' => 'Organic Mamia - Prunes', 'image' => 'organic7.jpeg'],
            15 => ['name' => 'Heinz Jar - Beef & Sweet Potato Mash', 'image' => 'jar1.jpeg'],
            16 => ['name' => 'Heinz Jar - Cheesy Tomato Pasta', 'image' => 'jar2.jpeg'],
            17 => ['name' => 'Heinz Jar - Mixed Vegetables', 'image' => 'jar3.jpeg'],
            18 => ['name' => 'Heinz Jar - Creamed Porridge', 'image' => 'jar4.jpeg'],
            19 => ['name' => 'Heinz Jar - Apple & Yoghurt', 'image' => 'jar5.jpeg'],
            20 => ['name' => 'Heinz Jar - Green Beans & Sweet Corn', 'image' => 'jar6.jpeg'],
            21 => ['name' => 'Heinz Jar - Apple Pommes', 'image' => 'jar7.jpeg'],
            22 => ['name' => 'Heinz Pouch - Sweet Potato & Beef Casserole', 'image' => 'heinz1.jpeg'],
            23 => ['name' => 'Heinz Pouch - Sunday Chicken Dinner', 'image' => 'heinz2.jpeg'],
            24 => ['name' => 'Heinz Pouch - Apple & Strawberry', 'image' => 'heinz3.jpeg'],
            25 => ['name' => 'Heinz Pouch - Apple & Blueberries', 'image' => 'heinz4.jpeg'],
            26 => ['name' => 'Heinz Pouch - Potato & Fish Pie', 'image' => 'heinz5.jpeg'],
            27 => ['name' => 'Heinz Pouch - Spaghetti Bolognese', 'image' => 'heinz6.jpeg'],
            28 => ['name' => 'Heinz Pouch - Apple,Spinach,Kiwi & Quinoa', 'image' => 'heinz7.jpeg'],
            29 => ['name' => 'Abidec', 'image' => 'Abidec.jpeg'],
            30 => ['name' => 'Brauer', 'image' => 'brauer.jpeg'],
            31 => ['name' => 'Garden of Life', 'image' => 'gardenoflife.jpeg'],
            32 => ['name' => 'Hali Baby', 'image' => 'halibaby.jpeg'],
            33 => ['name' => 'Mommys Bliss', 'image' => 'mommysbliss.jpeg'],
            34 => ['name' => 'Pentavite', 'image' => 'pentavite.jpeg'],
            35 => ['name' => 'Well Baby', 'image' => 'wellbaby.jpeg'],
        ];

        return view('checkout', [
            'cartItems' => $cartItems,
            'products' => $products
        ]);
    }

    public function submitCheckout(Request $request)
    {
        // Handle checkout form submission
        // Validate and process payment details
        // Save order to the database and handle post-checkout logic

        return redirect()->route('dashboard')->with('success', 'Order placed successfully.');
    }
}
