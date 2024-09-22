<!-- resources/views/edit_profile.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Profile</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">

    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f8f9fa;
        }

        .edit-profile-card {
            max-width: 500px;
            margin: 100px auto;
            /* Adjust margin-top to center vertically */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            background-color: #1099b9;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(51, 51, 51, 0.8);
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            box-sizing: border-box;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            white-space: nowrap;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .left,
        .navbar .right {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar .logo {
            margin-right: 10px;
        }

        .navbar img {
            height: 60px;
            width: auto;
        }

        .banner {
            position: relative;
            width: 100%;
            height: 70vh;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="banner">
        <img src="{{ asset('images/myprofile.jpeg.png.jpeg') }}" alt="Home Banner">

    </div>

    <div class="navbar">
        <div class="left">
            <div class="logo">
                <img src="{{ asset('images/careassist_logo copy.jpeg.png') }}" alt="Logo">
            </div>
            <a href="#">Home</a>
            <a href="#">Contact Us</a>
            <a href="{{ url('/userdashboard') }}">My Dashboard</a>
            <a href="{{ route('profile.show') }}">My Profile</a>
        </div>
        <div class="right">
            @if (Auth::check())
                <span style="color: white; margin-right: 15px;">{{ Auth::user()->username }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
            @endif
        </div>
    </div>

    <div class="edit-profile-card">

        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ $user->username }}" required>
                </div>

                <div class="form-group">
                    <label for="nic">NIC</label>
                    <input type="text" class="form-control" id="nic" name="nic"
                        value="{{ $user->nic }}" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age"
                        value="{{ $user->age }}" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city"
                        value="{{ $user->city }}" required>
                </div>

                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" id="street" name="street"
                        value="{{ $user->street }}" required>
                </div>

                <div class="form-group">
                    <label for="house_number">House Number</label>
                    <input type="text" class="form-control" id="house_number" name="house_number"
                        value="{{ $user->house_number }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</body>

</html>
