<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Orders</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f8fa;
            color: #333;
            margin: 0;
            padding: 20px;
            position: relative;
        }

        .banner {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-top: -330px;
            /* Cut off the upper half of the image */
        }

        h1 {
            font-size: 32px;
            color: #333;
            text-align: center;
            margin-bottom: 40px;
        }

        h2 {
            font-size: 24px;
            color: #000000;
            margin-bottom: 20px;
        }

        .order-card {
            width: 80%;
            /* Increase the width */
            margin: 20px auto;
            /* Center the card horizontally */
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center content horizontally */
            text-align: center;
            /* Center text content */
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .order-card h2,
        .order-card p {
            margin-top: 0;
            font-size: 20px;
            color: #333;
            margin-bottom: 12px;
            width: 100%;
            /* Ensure full-width for content alignment */
        }

        .order-card p strong {
            color: #000;
        }

        /* Popup Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .modal-content::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 22px;
            }

            .order-card {
                padding: 15px;
            }

            .order-card h2 {
                font-size: 18px;
            }

            .order-card p {
                font-size: 14px;
            }

            .modal-content {
                width: 90%;
            }
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: calc(50% - 20px);
            /* Two cards per row with margin */
            box-sizing: border-box;
            float: left;
            /* Align cards side by side */
        }
    </style>
</head>

<body>

    <img src="images/sellerdashboard.png" alt="Banner" class="banner">

    <h1>Supplier Orders</h1>


    @foreach ($purchaseOrderDetails as $order)
        <div class="order-card" onclick="openModal()">
            <h2>Order ID: {{ $order->id }}</h2>
            <p><strong>User ID:</strong> {{ $order->user_id }}</p>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>City:</strong> {{ $order->city }}</p>
            <p><strong>Street:</strong> {{ $order->street }}</p>
            <p><strong>House Number:</strong> {{ $order->house_number }}</p>
        </div>
    @endforeach

    <!-- Modal Structure -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Order</h2>
            @foreach ($userCarts as $cart)
                <div class="product-card">
                    <p><strong>Product ID:</strong> {{ $cart->product_id }}</p>
                    <p><strong>Quantity:</strong> {{ $cart->quantity }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Function to open the modal
        function openModal() {
            document.getElementById("orderModal").style.display = "flex";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("orderModal").style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById("orderModal")) {
                closeModal();
            }
        }
    </script>

</body>

</html>
