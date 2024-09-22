<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babysitter Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Add your CSS styles here or in a separate stylesheet */
    </style>
</head>

<body>
    <div class="card">
        <h1>Babysitter Registration</h1>
        <form action="{{ route('babysitter_register') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="agency_name">Agency Name:</label>
            <input type="text" id="agency_name" name="agency_name" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit" class="button">Register</button>
        </form>
    </div>
</body>

</html>
