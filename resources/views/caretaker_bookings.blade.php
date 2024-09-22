<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Navigation bar styling */
        .navbar {
            background-color: #003366;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            color: #fff;
            font-size: 24px;
            text-decoration: none;
        }

        .navbar-links {
            list-style: none;
            display: flex;
        }

        .navbar-links li {
            margin-left: 20px;
        }

        .navbar-links a {
            color: #fff;
            text-decoration: none;
            position: relative;
        }

        .navbar-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #fff;
            transition: width .3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .navbar-links a:hover::after {
            width: 100%;
        }

        .contact-info {
            color: #fff;
            font-size: 14px;
        }

        .explore-button {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fff;
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            width: 100%;
            font-family: 'Open Sans', sans-serif;
        }



        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .nav-bar {
            display: flex;
            justify-content: space-around;
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
        }

        .nav-bar a {
            display: block;
            padding: 15px;
            text-align: center;
            color: rgb(96, 138, 182);
            text-decoration: none;
            font-weight: bold;
            flex: 1;
        }

        .nav-bar a:hover {
            background-color: #e9ecef;
        }

        .nav-bar a.active {
            background-color: #083f76;
            color: #fff;
        }

        .main-heading {
            text-align: center;
            margin-top: 20px;
        }

        .appointments-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px;
        }

        .card {
            background: #f8f9fa;
            /* Light background for subtlety */
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            width: 30%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            font-size: 1em;
            color: #555;
            /* Darker grey for text */
            padding: 10px;
        }

        .card-title {
            font-size: 1.1em;
            margin-bottom: 5px;
            color: #083f76;
            /* Darker text color for titles */
        }

        .card-text {
            margin: 5px 0;
            /* Spacing for text */
        }

        .card-header {
            background-color: rgb(222, 227, 239);
            /* Soft blue for header */
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            text-align: center;
        }



        @media screen and (max-width: 768px) {
            .card {
                width: 100%;
            }
        }



        .icon {
            margin-right: 8px;
            color: #21568a;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="#" class="navbar-logo">CareAssist</a>

        <ul class="navbar-links">
            <li><a href="{{ url('/dashboard') }}">Home</a></li>
            <li><a href="{{ url('/userdashboard') }}">My Dashboard</a></li>
            <li><a href="{{ route('profile.show') }}">My Profile</a></li>
            @if (Auth::check())
                <li><a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                        Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        </ul>

        <div class="contact-info">
            <span>📞 072 530 6972 | 📧 info@careassist.net</span>
        </div>
    </div>


    <div class="nav-bar">
        <a href="{{ url('/userdashboard_caretaker') }}"
            class="{{ request()->is('caretaker_bookings') ? 'active' : '' }}">Caretaker Bookings</a>

        <a href="{{ url('/userdashboard') }}" class="{{ request()->is('userdashboard') ? 'active' : '' }}">Babysitter
            Bookings</a>

        <a
            href="{{ url('/userdashboard_therapy') }}"class="{{ request()->is('userdashboard_therapy') ? 'active' : '' }}">Mental
            Health Therapy Appointments</a>
    </div>



    <div class="main-heading">
        <h1>View your caretaker bookings</h1>
    </div>

    <div class="appointments-container">
        @foreach ($caretakerRequests as $request)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $request->patient_name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <strong><i class="fas fa-calendar-alt icon"></i>Booking date:</strong> {{ $request->date }}
                    </p>
                    <p class="card-text">
                        <strong><i class="fas fa-clock icon"></i>Booking time:</strong> {{ $request->start_time }} -
                        {{ $request->end_time }}
                    </p>
                    <p class="card-text">
                        <strong><i class="fas fa-map-marker-alt icon"></i> Location:</strong> {{ $request->location }}
                    </p><br>
                    <p class="card-text">
                        @if ($request->status == 'pending')
                            <span style="color: grey;">Booking request is pending</span>
                        @elseif ($request->status == 'accepted')
                            <span style="color: green;">Booking request is accepted</span>
                        @elseif ($request->status == 'declined')
                            <span style="color: red;">Booking request is declined</span>
                        @endif
                    </p>

                </div>
            </div>
        @endforeach
    </div>


    <script></script>
</body>

</html>
