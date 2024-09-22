<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            grid-template-rows: auto auto;
        }

        .card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .order-summary-header {
            text-align: right;
            /* Aligns "Order Summary" header text to the right */
        }

        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-info img {
            margin-right: 10px;
        }

        .total,
        .summary-item {
            text-align: right;
            /* Aligns summary text to the right */
            padding: 10px 0;
            font-size: 18px;
            font-weight: bold;
            border-top: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .full-width {
            grid-column: span 2;
            /* Makes the card span across both columns */
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .section {
            padding: 10px;
        }

        .personal-info,
        .payment-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
        }

        h2 {
            margin-top: 0;
            font-size: 1.2em;
        }

        .card-images {
            display: flex;
            gap: 10px;
        }

        .card-images img {
            width: 80px;
            height: 50px;
        }

        /* Popup Style */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .popup.active {
            display: block;
        }

        .popup .popup-content {
            text-align: center;
        }

        .popup .popup-content p {
            font-size: 1.2em;
            margin: 20px 0;
        }

        .popup .popup-content .btn {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .popup .popup-content .btn:hover {
            background-color: #218838;
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
    <form id="checkout-form" action="{{ route('orderdetails') }}" method="GET">
        <div class="container">

            <!-- Your Order Card -->
            <div class="card">
                <div class="card-header">Your Order</div>
                <div>
                    @foreach ($cartItems as $item)
                        @php
                            $product = $products[$item->product_id] ?? ['name' => 'Unknown', 'image' => 'default.jpeg'];
                        @endphp
                        <div class="product-info">
                            <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"
                                class="product-image">
                            {{ $product['name'] }} - {{ $item->total_quantity }} x
                            Rs.{{ number_format($item->total_amount / $item->total_quantity, 2) }} =
                            Rs.{{ number_format($item->total_amount, 2) }}
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary Card -->
            <div class="card">
                <div class="card-header order-summary-header">Order Summary</div>
                <div>
                    @php
                        $totalAmount = $cartItems->sum('total_amount');
                        $tax = $totalAmount * 0.1;
                        $shipping = 350;
                        $finalTotal = $totalAmount + $tax + $shipping;
                    @endphp
                    <div class="summary-item">
                        Subtotal: Rs.{{ number_format($totalAmount, 2) }}
                    </div>
                    <div class="summary-item">
                        Tax (10%): Rs.{{ number_format($tax, 2) }}
                    </div>
                    <div class="summary-item">
                        Shipping: Rs.{{ number_format($shipping, 2) }}
                    </div>
                    <div class="summary-item">
                        <strong>Total: Rs.{{ number_format($finalTotal, 2) }}</strong>
                    </div>
                </div>
            </div>

            <!-- Personal Information Form -->





            <button type="submit" id="confirm" class="btn">Confirm Order</button>

        </div>
    </form>

    <!-- Popup Message -->
    <div id="popup-message" class="popup">
        <div class="popup-content">
            <p>Your payment is being processed...</p>
            <button id="close-popup" class="btn">OK</button>
        </div>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            document.getElementById('popup-message').classList.add('active'); // Show popup

            // Delay form submission to show popup
            setTimeout(function() {
                document.getElementById('checkout-form').submit();
            }, 500); // 500ms delay
        });

        document.getElementById('close-popup').addEventListener('click', function() {
            document.getElementById('popup-message').classList.remove('active');
        });
    </script>
</body>

</html>
