<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .payment-form {
            max-width: 500px;
            width: 100%;
            margin: 20px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .payment-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .payment-form .form-group {
            margin-bottom: 15px;
        }

        .payment-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .payment-form .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            color: #495057;
        }

        .payment-form .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .payment-form .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .payment-form .btn:hover {
            background-color: #218838;
        }

        .payment-form .btn:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
    </style>
</head>

<body>
    <div class="payment-form">
        <h2>Payment for Caretaker</h2>
        <form action="{{ route('payment.process', ['caretaker_id' => $caretaker_id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="card_expiry">Expiry Date</label>
                <input type="text" id="card_expiry" name="card_expiry" class="form-control" placeholder="MM/YY"
                    required>
            </div>
            <div class="form-group">
                <label for="card_cvc">CVC</label>
                <input type="text" id="card_cvc" name="card_cvc" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Pay Now</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
