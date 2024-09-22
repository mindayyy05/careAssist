<!-- resources/views/provider_register.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Provider Registration</title>
</head>

<body>
    <h1>Register as a Mental Health Provider</h1>
    <form action="{{ route('provider_register.post') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="agency_name">Agency Name:</label>
        <input type="text" id="agency_name" name="agency_name" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>
