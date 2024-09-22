<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caretaker Login</title>
    <style>
        body {
            background-color: lightblue;
            /* Keeping the original background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            /* Increased padding for better spacing */
            width: 100%;
            max-width: 400px;
            /* Increased width of the card */
            text-align: center;
        }

        .alert {
            color: red;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            /* Increased margin for better spacing */
            font-size: 24px;
            /* Slightly smaller font size */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center the form elements horizontally */
        }

        label {
            font-size: 14px;
            /* Slightly smaller font size for labels */
            margin-bottom: 8px;
            /* Increased margin for better spacing */
            color: #555;
            width: 100%;
            /* Ensure label takes full width */
            text-align: left;
            /* Align text to left for better readability */
        }

        input[type="email"],
        input[type="password"] {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            /* Slightly increased padding */
            font-size: 14px;
            /* Smaller font size */
            margin-bottom: 15px;
            /* Increased margin */
            width: 100%;
            /* Full width for inputs */
        }

        button {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            /* Smaller font size for the button */
            padding: 10px;
            /* Slightly increased padding */
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            /* Full width for button */
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Caretaker Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('caretaker_login_post') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>

</html>
