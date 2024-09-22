<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .button {
            background-color: #1099b9;
            /* Slightly darker sky blue shade */
            color: white;
            padding: 15px 30px;
            /* Increased padding for larger button */
            border: none;
            border-radius: 25px;
            /* Increased border-radius for a larger button */
            text-decoration: none;
            font-size: 20px;
            /* Increased font size */
            display: inline-block;
        }

        .button:hover {
            background-color: #21568a;
            /* Darker blue shade for hover */
        }
    </style>
</head>

<body style="background-color: white; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="text-align: center;">
        <img src="{{ asset('images/careassist_logo copy.jpeg.png') }}" alt="Logo"
            style="max-width: 100%; height: auto;">
        <br><br>
        <a href="{{ route('who_are_you') }}" class="button">Get Started &gt;</a>
    </div>
</body>

</html>
