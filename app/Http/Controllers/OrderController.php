<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseOrderDetail;
use App\Models\UserCart;

class OrderController extends Controller
{



    public function showOrders()
    {
        // Retrieve all records from purchase_order_details and usercarts tables
        $purchaseOrderDetails = PurchaseOrderDetail::all();
        $userCarts = UserCart::all();

        // Pass the data to the view
        return view('supplier_orders', compact('purchaseOrderDetails', 'userCarts'));
    }
}
