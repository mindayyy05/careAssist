<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caretaker Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            /* Reduced width */
        }

        h1 {
            font-size: 1.5rem;
            /* Slightly smaller font size */
            color: #333;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Reduced gap */
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 4px;
            /* Reduced margin */
            text-align: left;
        }

        input,
        select {
            padding: 8px;
            /* Reduced padding */
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 0.9rem;
            /* Slightly smaller font size */
        }

        button {
            background-color: #007bff;
            border: none;
            padding: 8px;
            color: white;
            border-radius: 5px;
            font-size: 0.9rem;
            /* Slightly smaller font size */
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 10px;
            /* Reduced margin */
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Caretaker Registration</h1>
        <form action="{{ route('caretaker_register_post') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <select id="agency_name" name="agency_name" required>
                <option value="">Select Agency</option>
                <option value="Care Givers Inc.">Care Givers Inc.</option>
                <option value="Family First Care">Family First Care</option>
                <option value="Helping Hands Agency">Helping Hands Agency</option>
                <option value="Senior Support Services">Senior Support Services</option>
                <option value="Quality Care Network">Quality Care Network</option>
                <option value="Caretakers & Co">Caretakers & Co</option>
            </select>

            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already signed up? <a href="{{ route('caretaker_login') }}">Log In</a></p>
    </div>
</body>

</html>
