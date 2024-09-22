<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who Are You</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/whoareyou.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            text-align: center;
            position: relative;
            left: -300px;
            /* Adjust the card's position slightly to the left */
        }

        .button {
            background-color: #1099b9;
            color: white;
            padding: 15px 30px;
            /* Increased padding for larger button */
            border: none;
            border-radius: 25px;
            /* Increased border-radius for a larger button */
            text-decoration: none;
            font-size: 18px;
            /* Increased font size */
            display: inline-block;
            text-align: center;
            /* Center text inside button */
            overflow: hidden;
            /* Hide overflow text */
            white-space: nowrap;
            /* Prevent text wrapping */
            margin-bottom: 20px;
            /* Space between buttons */
        }

        .button.customer {
            width: 200px;
            /* Fixed width for Customer button */
        }

        .button.agency {
            width: 250px;
            /* Fixed width for Service Providing Agency button */
        }

        .button:hover {
            background-color: #21568a;
        }

        #agency-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 20px;
            /* Space between select and button */
            width: 100%;
            /* Make select box full width within the card */
            max-width: 300px;
            /* Limit maximum width of the select box */
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Who Are You?</h1>
        <br><br>
        <a href="{{ route('register') }}" class="button customer">Customer</a>
        <br><br>
        <button class="button agency" onclick="showAgencyOptions()">Service Providing Agency</button>
        <br><br>
        <div id="agency-options" style="display: none;">
            <form id="agency-form">
                <select name="agency_type" id="agency-type" required>
                    <option value="caretaker">Caretaker Agency</option>
                    <option value="babysitter">Babysitter Agency</option>
                    <option value="therapist">Mental Health Agency</option>
                    <option value="supplier">Health Products Supplier</option>
                </select>
                <button type="button" class="button agency" onclick="redirectBasedOnSelection()">Sign Up</button>
            </form>
        </div>
    </div>
    <script>
        function showAgencyOptions() {
            document.getElementById('agency-options').style.display = 'block';
        }

        function redirectBasedOnSelection() {
            const agencyType = document.getElementById('agency-type').value;
            if (agencyType === 'caretaker') {
                window.location.href = "{{ route('caretaker_register') }}";
            } else if (agencyType === 'therapist') {
                window.location.href = "{{ route('provider_login') }}";
            } else if (agencyType === 'babysitter') {
                window.location.href = "{{ route('babysitter_login') }}";
            } else if (agencyType === 'supplier') {
                window.location.href = "{{ route('supplier_login') }}";
            } else {
                alert('Other agency types are not handled in this example.');
            }
        }
    </script>
</body>

</html>
