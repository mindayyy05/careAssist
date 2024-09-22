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









        .card .card-img-top {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card:hover {
            transform: scale(1.02);
        }





        .todo-list {
            margin-top: 5%;
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

        .container {
            padding: 20px;
            margin-top: 20px;
        }

        .bookings-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .booking-card {
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-image: url('{{ asset('images/bbcard.png') }}');
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.8);
            /* Adjust opacity for content readability */
            padding: 20px;
            border-radius: 0 0 15px 15px;
            margin-top: 20px;
            /* Add this line to add margin to the top */
        }


        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            margin: 0 auto 20px auto;
            font-family: 'Roboto', sans-serif;
        }



        .card-title {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .card-text {
            font-family: 'Open Sans', sans-serif;
        }

        .status-accepted {
            color: #28a745;
        }

        .status-declined {
            color: #dc3545;
        }

        .todo-list .list-group-item {
            background-color: #f8f9fa;
            border: none;
            margin-bottom: 5px;
            border-radius: 5px;
            font-family: 'Open Sans', sans-serif;
        }

        .todo-list h3 {
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
            width: 250px;
            font-family: 'Roboto', sans-serif;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
            width: 250px;
            font-family: 'Roboto', sans-serif;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }



        /* Modal input fields styling */
        .modal-content .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
            font-size: 1rem;
        }

        .modal-content .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-header {
            border-bottom: 1px solid #e9ecef;
            padding: 15px;
        }

        .modal-title {
            font-family: 'Roboto', sans-serif;
            font-size: 1.25rem;
        }

        .modal-footer {
            border-top: 1px solid #e9ecef;
            padding: 15px;
            text-align: right;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
            font-family: 'Roboto', sans-serif;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }






        @media (max-width: 768px) {
            .booking-card {
                width: calc(50% - 20px);
                /* 2 cards per row on medium screens */
            }
        }

        @media (max-width: 576px) {
            .booking-card {
                width: 100%;
                /* 1 card per row on small screens */
            }

            .card-title {
                font-size: 1.5rem;
            }

            .banner {
                height: 40vh;
            }

            .btn-primary,
            .btn-success {
                padding: 10px;
                font-size: 0.9rem;
            }
        }

        .main-heading {
            text-align: center;
        }

        .card5 {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            width: 600px;
            /* Set the width of the card */
            max-width: 100%;
            /* Ensure the card does not exceed the viewport width */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        .card5-image {
            width: 200px;
            /* Set the width of the image */
            height: 200px;
            /* Set the height of the image */
            object-fit: cover;
            padding: 15px;
            /* Add padding around the image */
        }

        .card5-text {
            padding: 20px;
            /* Padding around the text content */
            flex: 1;
        }

        .card5-text p {
            margin: 10px 0;
        }

        .call-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .call-button:hover {
            background-color: #218838;
        }

        .container5 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f4f6f4;
        }

        .hidden-section {
            display: none;
            margin-top: 20px;
        }

        .status-accepted {
            color: green;
            font-weight: bold;
        }

        .status-declined {
            color: red;
            font-weight: bold;
        }

        .status-pending {
            color: black;
            font-weight: bold;
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


        /* Popup Card Styling */
        #todo-card {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            left: 50%;
            /* Center horizontally */
            top: 50%;
            /* Center vertically */
            transform: translate(-50%, -50%);
            /* Center the popup */
            background-color: #fff;
            /* White background */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow for 3D effect */
            padding: 20px;
            /* Padding inside the card */
            z-index: 1001;
            /* Make sure it appears on top of other content */
        }

        /* Card Title Styling */
        #todo-card h2 {
            margin-top: 0;
        }

        /* Overlay for Background Dimming */
        #overlay {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Semi-transparent black */
            z-index: 1000;
            /* Positioned below the card */
        }

        #view-todo-btn {
            margin-top: 20px;
            margin-left: 40px;
            text-align: center;
        }

        .add-todo-btn {
            margin-left: 40px;
            /* Adjust this value to your preferred margin */
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }

        .completed-card {
            color: #6c757d;
            /* Dull grey color */
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
        <a href="{{ route('caretaker_bookings') }}"
            class="{{ request()->routeIs('caretaker_bookings') ? 'active' : '' }}">Caretaker Bookings</a>
        <a href="{{ url('/userdashboard') }}" class="{{ request()->is('userdashboard') ? 'active' : '' }}">Babysitter
            Bookings</a>
        <a href="{{ url('/userdashboard_therapy') }}"
            class="{{ request()->is('userdashboard_therapy') ? 'active' : '' }}">Mental Health Therapy Appointments</a>
    </div>


    <div class="main-heading">
        <h1>View your babysitter bookings</h1>
    </div>



    <div class="container">

        <div class="bookings-container">
            @if (isset($bookings) && $bookings->count() > 0)
                @foreach ($bookings as $booking)
                    <div class="booking-card {{ $booking->completed_status === 'completed' ? 'completed-card' : '' }}">
                        <div class="card-body">

                            <h4 class="card-title">{{ $booking->childName }}</h4>
                            <p class="card-text">Address: {{ $booking->houseAddress }}</p><br>
                            <p class="card-text">Booking Date: {{ $booking->bookingDate }}</p>
                            <p class="card-text">Booking Time: {{ $booking->bookingTime }}</p><br>

                            <p class="card-text">
                                Status: Babysitter
                                <span
                                    class="{{ $booking->status === 'accepted' ? 'text-success' : ($booking->status === 'declined' ? 'text-danger' : '') }}">
                                    {{ $booking->status }} your hire request
                                </span>
                            </p>

                        </div>
                    </div>
                @endforeach
            @else
                <p>No bookings available.</p>
            @endif
        </div>
    </div>



    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Function to toggle the to-do list visibility for the clicked card
        function toggleTodoList(event) {
            // Get the parent card of the button that was clicked
            var card = event.currentTarget.closest('.booking-card');

            // Find the to-do list inside that specific card
            var todoList = card.querySelector('.todo-list');

            // Toggle the visibility of the to-do list
            if (todoList.style.display === 'none' || todoList.style.display === '') {
                todoList.style.display = 'block';
            } else {
                todoList.style.display = 'none';
            }
        }

        // Attach the event listener to all "Add to-do list" buttons
        document.querySelectorAll('.add-todo-btn').forEach(function(button) {
            button.addEventListener('click', toggleTodoList);
        });


        document.getElementById('view-todo-btn').addEventListener('click', function() {
            document.getElementById('todo-card').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        });

        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('todo-card').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        function showTodoCard() {
            document.getElementById('todo-card').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeTodoCard() {
            document.getElementById('todo-card').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</body>

</html>
