<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap">

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

        .banner {
            position: relative;
            width: 100%;
            height: 50vh;
            overflow: hidden;
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


        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            white-space: nowrap;
            font-family: 'Roboto', sans-serif;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
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
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 10px;
            width: 47%;
            /* Adjusted width to fit two cards per row */
            background-image: url('images/therapycard.jpeg');
            /* Replace with your image path */
            background-size: cover;

        }

        .card-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .card-body {
            font-size: 1em;
            color: #333;
        }

        @media screen and (max-width: 768px) {
            .card {
                width: 100%;
                /* Full width on smaller screens */
            }
        }

        .status-pending {
            color: blue;
        }

        .status-completed {
            color: green;
        }

        .card-completed {
            color: #777;
            /* Dull grey color for completed cards */
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
        <a href="{{ url('/caretaker_bookings') }}"
            class="{{ request()->is('caretaker_bookings') ? 'active' : '' }}">Caretaker Bookings</a>
        <a href="{{ url('/userdashboard') }}" class="{{ request()->is('userdashboard') ? 'active' : '' }}">Babysitter
            Bookings</a>
        <a href="{{ url('/userdashboard_therapy') }}"
            class="{{ request()->is('userdashboard_therapy') ? 'active' : '' }}">Mental Health Therapy Appointments</a>
    </div>


    <div class="main-heading">
        <h1>View your therapy bookings</h1>
    </div>

    <div class="appointments-container">
        @foreach ($appointments as $appointment)
            <div class="card {{ $appointment->status === 'completed' ? 'card-completed' : '' }}">
                <div class="card-title">
                    <strong>Appointment on
                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y') }}</strong>
                </div>
                <p><strong>Status:</strong> Therapy session is <span
                        class="{{ $appointment->status === 'pending' ? 'status-pending' : 'status-completed' }}">{{ $appointment->status }}</span>
                </p><br>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $appointment->user_name }}</p>
                    <p><strong>Time Slot:</strong> {{ $appointment->time_slot }}</p>
                    <p><strong>Reason for Therapy:</strong> {{ $appointment->reason_for_therapy }}</p>
                    <p><strong>Location:</strong> Moonstone Agency, Colombo 7</p>
                </div>
            </div>
        @endforeach
    </div>


    <script></script>
</body>

</html>
