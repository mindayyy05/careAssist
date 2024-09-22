<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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
            grid-template-columns: 1fr;
            gap: 20px;
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error {
            color: #3c80e7;
            font-size: 0.875em;
            margin-top: 5px;
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
    <div class="container">
        <!-- Personal Information Form -->
        <div class="card full-width">
            <div class="card-header">Checkout</div>
            <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="form-container">
                    <!-- Personal Information Section -->
                    <div class="section personal-info">
                        <h2>Personal Information</h2>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                            <div class="error" id="name-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                            <div class="error" id="phone-error">Phone number must be 10 digits.</div>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" required>
                            <div class="error" id="city-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" id="street" name="street" required>
                            <div class="error" id="street-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="house_number">House Number</label>
                            <input type="text" id="house_number" name="house_number" required>
                            <div class="error" id="house_number-error"></div>
                        </div>
                    </div>

                    <!-- Payment Details Section -->
                    <div class="section payment-details">
                        <h2>Payment Details</h2>
                        <div class="form-group">
                            <label for="card_type">Card Type</label>
                            <div class="card-images">
                                <img src="{{ asset('images/visa.jpeg') }}" alt="Visa">
                                <img src="{{ asset('images/mastercard.jpeg') }}" alt="MasterCard">
                                <img src="{{ asset('images/american.jpeg') }}" alt="American Express">
                            </div>
                            <select id="card_type" name="card_type" required>
                                <option value="" disabled selected>Select Card Type</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="american_express">American Express</option>
                            </select>
                            <div class="error" id="card_type-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" id="card_number" name="card_number" pattern="\d{16}" required>
                            <div class="error" id="card_number-error">Card number must be 16 digits.</div>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="text" id="expiry_date" name="expiry_date" pattern="\d{2}/\d{2}"
                                placeholder="MM/YY" required>
                            <div class="error" id="expiry_date-error">Expiry date must be in MM/YY format.</div>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" pattern="\d{3}" required>
                            <div class="error" id="cvv-error">CVV must be 3 digits.</div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="pay-button" class="btn">Pay</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            let valid = true;

            // Personal Information Validation
            const name = document.getElementById('name');
            const phone = document.getElementById('phone');
            const city = document.getElementById('city');
            const street = document.getElementById('street');
            const houseNumber = document.getElementById('house_number');
            const cardType = document.getElementById('card_type');
            const cardNumber = document.getElementById('card_number');
            const expiryDate = document.getElementById('expiry_date');
            const cvv = document.getElementById('cvv');

            // Clear previous errors
            document.querySelectorAll('.error').forEach(el => el.textContent = '');

            if (name.value.trim() === '') {
                document.getElementById('name-error').textContent = 'Name is required.';
                valid = false;
            }

            if (phone.value.trim() === '' || !/^\d{10}$/.test(phone.value)) {
                document.getElementById('phone-error').textContent = 'Phone number must be 10 digits.';
                valid = false;
            }

            if (city.value.trim() === '') {
                document.getElementById('city-error').textContent = 'City is required.';
                valid = false;
            }

            if (street.value.trim() === '') {
                document.getElementById('street-error').textContent = 'Street is required.';
                valid = false;
            }

            if (houseNumber.value.trim() === '') {
                document.getElementById('house_number-error').textContent = 'House number is required.';
                valid = false;
            }

            if (cardType.value === '') {
                document.getElementById('card_type-error').textContent = 'Card type is required.';
                valid = false;
            }

            if (cardNumber.value.trim() === '' || !/^\d{16}$/.test(cardNumber.value)) {
                document.getElementById('card_number-error').textContent = 'Card number must be 16 digits.';
                valid = false;
            }

            if (expiryDate.value.trim() === '' || !/^\d{2}\/\d{2}$/.test(expiryDate.value)) {
                document.getElementById('expiry_date-error').textContent = 'Expiry date must be in MM/YY format.';
                valid = false;
            }

            if (cvv.value.trim() === '' || !/^\d{3}$/.test(cvv.value)) {
                document.getElementById('cvv-error').textContent = 'CVV must be 3 digits.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
