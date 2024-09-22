<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* Add your CSS here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #575757;
            border-radius: 4px;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 0 auto;
            gap: 20px;
            /* Space between the two columns */
            margin-bottom: 50px;
            /* Space for footer or other content */
        }

        .cart-items {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-item {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-sizing: border-box;
            width: 100%;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-info {
            flex: 1;
        }

        .product-info h2 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .product-info p {
            margin: 5px 0;
            color: #777;
        }

        .summary-card {
            flex: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Space out content */
            max-height: 300px;
            /* Maximum height for the summary card */
            overflow-y: auto;
            /* Add scroll if content exceeds max-height */
        }


        .summary-card h2 {
            margin-top: 0;
        }

        .summary-card p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        .amount,
        .tax,
        .shipping,
        .total {
            font-weight: bold;
        }

        .btn {
            display: block;
            padding: 10px 20px;
            margin-top: 20px;
            /* Space between total and button */
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .delete-icon {
            cursor: pointer;
            color: #ff0000;
            font-size: 20px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Favorites</a></li>
            <li><a href="{{ route('shoppingcart') }}">Cart</a></li>
            <li><a href="">User Account</a></li>
        </ul>
    </nav>
    <h1>Your Shopping Cart</h1>
    <div class="container">
        <div class="cart-items">
            @foreach ($cartItems as $item)
                @php
                    $product = $products[$item->product_id] ?? ['name' => 'Unknown', 'image' => 'default.jpeg'];
                @endphp
                <div class="cart-item">
                    <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"
                        class="product-image">
                    <div class="product-info">
                        <h2>{{ $product['name'] }}</h2>
                        <p>Quantity: {{ $item->total_quantity }}</p>
                        <p class="amount">Rs.{{ number_format($item->total_amount, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="summary-card">
            @php
                $totalAmount = $cartItems->sum('total_amount');
                $tax = $totalAmount * 0.1; // 10% tax
                $shipping = 350; // Fixed shipping cost
                $finalTotal = $totalAmount + $tax + $shipping;
            @endphp
            <h2>Order Summary</h2>
            <p class="amount">Amount: Rs.{{ number_format($totalAmount, 2) }}</p>
            <p class="tax">Tax (10%): Rs.{{ number_format($tax, 2) }}</p>
            <p class="shipping">Shipping: Rs.{{ number_format($shipping, 2) }}</p>
            <p class="total">Total: Rs.{{ number_format($finalTotal, 2) }}</p>
            <a href="{{ route('checkout') }}" class="btn">Proceed to Checkout</a>
        </div>

    </div>
</body>

</html>
