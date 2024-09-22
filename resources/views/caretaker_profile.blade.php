<!-- resources/views/caretaker_profile.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Caretaker Profile</title>
    <style>
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
            padding-top: 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        .profile-info {
            font-size: 16px;
            color: #555;
        }

        .profile-info span {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="logo">
                <img src="{{ asset('images/careassist_logo copy.jpeg.png') }}" alt="Logo">
            </div>
            <a href="#">Home</a>
            <a href="#">Contact Us</a>
            <a href="{{ url('/userdashboard') }}">My Dashboard</a>
            <a href="{{ route('caretaker.profile') }}">My Profile</a>
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
    <div class="container">
        <div class="profile-card">
            <h2>Caretaker Profile</h2>
            <div class="profile-info">
                <span><strong>Name:</strong> {{ $caretaker->name }}</span>
                <span><strong>Email:</strong> {{ $caretaker->email }}</span>
                <span><strong>Gender:</strong> {{ $caretaker->gender }}</span>
                <span><strong>Location:</strong> {{ $caretaker->city }}</span>
                <span><strong>Qualifications:</strong> {{ $caretaker->qualifications }}</span>
                <span><strong>Experience:</strong> {{ $caretaker->experience }} years</span>
            </div>
        </div>
    </div>
</body>

</html>
