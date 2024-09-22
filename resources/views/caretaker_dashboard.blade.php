<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Assist - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #181A1B;
            color: #FFF;

        }


        .sidebar {
            width: 250px;
            background-color: #1F1F1F;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            overflow-y: auto;
            /* Allow scrolling if content overflows */
        }

        .logo h1 {
            color: #FFF;
            text-align: center;
        }

        .menu ul,
        .account-settings ul {
            list-style: none;
            padding: 0;
        }

        .menu li,
        .account-settings li {
            margin-bottom: 20px;
        }

        .menu a,
        .account-settings a {
            color: #AAA;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu a:hover,
        .account-settings a:hover {
            background-color: #292B2C;
        }

        .menu .active a {
            color: #FFF;
            background-color: #292B2C;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #202124;
            min-height: 100vh;
            /* Ensures it covers the entire viewport height */
            overflow-y: auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-left: 50px;
        }

        header h2 {
            color: #FFF;
        }

        .right-controls {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 20px;
            background-color: #333;
            color: #FFF;
        }

        .new-booking-btn {
            background-color: #1976D2;
            border: none;
            color: #FFF;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .dashboard {
            display: grid;
            /* Use grid layout */
            grid-template-columns: repeat(3, 1fr);
            /* 3 columns of equal width */
            gap: 20px;
            /* Gap between cards */
            margin-left: 40px;
        }

        .booking-card {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            box-sizing: border-box;
            color: #FFF;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
            overflow: hidden;
        }

        .booking-card:hover {
            background-color: #444;
        }


        .booking-title {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .booking-date {
            font-size: 12px;
            color: #AAA;
            margin-bottom: 15px;
        }

        .booking-buttons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .accept-btn,
        .decline-btn,
        .details-btn {
            background-color: #18be31;
            border: none;
            color: #FFF;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 48%;
        }

        .decline-btn {
            background-color: #FF4D4F;
        }

        .details-btn {
            width: 100%;
            background-color: #3280ed;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }


        .modal-content {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            width: 40%;
            color: #FFF;
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #FF4D4F;
            border: none;
            color: #FFF;
            cursor: pointer;
            border-radius: 5px;
        }


        .booking-buttons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .accept-btn,
        .decline-btn,
        .view-details {
            background-color: #18be31;
            border: none;
            color: #FFF;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 48%;
        }

        .decline-btn {
            background-color: #FF4D4F;
        }

        .view-details {
            width: 100%;
            background-color: #3280ed;
            margin-bottom: 7px;
        }




        .mode-toggle {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .mode-toggle input[type="checkbox"] {
            display: none;
        }

        .mode-toggle label {
            cursor: pointer;
            background-color: #333;
            color: #FFF;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }

        .mode-toggle input[type="checkbox"]:checked+label {
            background-color: #1976D2;
        }

        /* General styles for light and dark modes */
        body.light-mode {
            background-color: #F0F0F0;
            color: #000;
        }

        body.light-mode .sidebar {
            background-color: #0d5b78;
        }

        body.light-mode .main-content {
            background-color: #FFF;
        }

        body.light-mode .booking-card {
            background-color: #F9F9F9;
            color: #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        body.light-mode .booking-card:hover {
            background-color: #E0E0E0;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            /* Enhanced shadow on hover */
        }

        body.light-mode .modal-content {
            background-color: #ffffff;
            color: #000;
        }

        body.light-mode .search-input {
            background-color: #CCC;
            color: #000;
        }

        body.light-mode .new-booking-btn {
            background-color: #1976D2;
        }

        /* Adjusting text colors for light mode */
        body.light-mode .booking-title {
            color: #333;
            /* Darker text color for titles */
        }

        body.light-mode .booking-date {
            color: #666;
            /* Lighter text color for dates */
        }

        body.light-mode .accept-btn,
        body.light-mode .decline-btn,
        body.light-mode .details-btn {
            color: #FFF;
        }

        body.light-mode .accept-btn {
            background-color: #18be31;
        }

        body.light-mode .decline-btn {
            background-color: #FF4D4F;
        }

        body.light-mode .details-btn {
            background-color: #3280ed;
        }

        body.light-mode .menu a,
        .account-settings a {
            color: white;
        }

        /* Style for the modal background (hidden by default) */
        .modal-content {
            background-color: #333;
            /* Dark background for modal */
            padding: 20px;
            border-radius: 8px;
            color: white;
            /* Ensure text is visible */
            width: 40%;
            text-align: center;
            position: relative;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            /* Add shadow to stand out */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            /* Dark overlay background */
            justify-content: center;
            align-items: center;
        }


        /* Close button style */
        .close {
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            float: right;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Care Assist</h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('babysitter.dashboard') }}"><i class="fas fa-list"></i> Dashboard</a></li>
                <li><a href="{{ route('acceptedbookings') }}"><i class="fas fa-list"></i> Active bookings</a></li>
                <li><a href="{{ route('declinedbookings') }}"><i class="fas fa-times"></i> Declined bookings</a></li>
                <!-- Updated Link -->
                <li><a href="profile.html"><i class="fas fa-user-cog"></i> My Profile</a></li>
                <li><a href="#"><i class="fas fa-check"></i> Finished bookings</a></li>
                <li><a href="{{ route('babysitter_message.view') }}"><i class="fas fa-envelope"></i> Messages</a></li>
            </ul>


        </div>

        <div class="account-settings">
            <ul>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="mode-toggle">
                <input type="checkbox" id="mode-toggle" />
                <label for="mode-toggle">🌙 / ☀️</label>
            </div>
            <h2>Dashboard</h2>
            <div class="right-controls">
                <input type="text" placeholder="Search" class="search-input">
                <button class="new-booking-btn">+ New booking</button>
            </div>
        </header>

        <h1>vView Upcoming Sessions</h1><br><br>

        <div class="dashboard">
            @foreach ($caretakerRequests as $request)
                <div class="booking-card" id="card{{ $request->id }}">
                    <div class="booking-info">
                        <h3>{{ $request->patient_name }}</h3>
                        <p>Date: {{ $request->date }}</p>
                    </div>
                    <button class="view-details" onclick="openPopup({{ $request->id }})">View Details</button>


                    <!-- Popup Modal for dynamic details -->

                    <div id="popup-modal-{{ $request->id }}" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closePopup({{ $request->id }})">&times;</span>
                            <h2>Details for {{ $request->patient_name }}</h2>
                            <p><b>Age: </b>{{ $request->age }}</p>
                            <p><b>Phone Number: </b>{{ $request->phone }}</p>
                            <p><b>Location: </b>{{ $request->location }}</p>
                            <p><b>Start Time: </b>{{ $request->start_time }}</p>
                            <p><b>End Time: </b>{{ $request->end_time }}</p>
                            <p><b>Allergies: </b>{{ $request->allergies }}</p>
                            <p><b>Disabilities: </b>{{ $request->disabilities }}</p>
                            <p><b>Bathing Times: </b>{{ $request->bathing_times }}</p>
                            <p><b>Bathing Method: </b>{{ $request->bathing_method }}</p>
                            <p><b>Breakfast Time: </b>{{ $request->breakfast_time }}</p>
                            <p><b>Lunch Time: </b>{{ $request->lunch_time }}</p>
                            <p><b>Dinner Time: </b>{{ $request->dinner_time }}</p>

                        </div>
                    </div>




                    <div class="booking-buttons">
                        <button type="button" class="accept-btn"
                            onclick="submitForm('{{ route('acceptRequest', $request->id) }}')">
                            Accept
                        </button>

                        <button type="button" class="decline-btn"
                            onclick="submitForm('{{ route('declineRequest', $request->id) }}')">
                            Decline
                        </button>
                    </div>
                    <p>Status: <span
                            class="status-{{ strtolower($request->status) }}">{{ ucfirst($request->status) }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>







    <script>
        function submitForm(actionUrl) {
            // Create a form element
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = actionUrl;

            // Add CSRF token input
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}'; // Assuming Laravel's CSRF token is available
            form.appendChild(csrfToken);

            // Append form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
        document.getElementById('mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('light-mode');
                localStorage.setItem('theme', 'light');
            } else {
                document.body.classList.remove('light-mode');
                localStorage.setItem('theme', 'dark');
            }
        });

        function updateStatus() {
            alert('Status updated successfully!');
            location.reload(); // Refresh the page
        }




        function openPopup(id) {
            document.getElementById('popup-modal-' + id).style.display = 'flex'; /* Display as flex to center content */
        }

        function closePopup(id) {
            document.getElementById('popup-modal-' + id).style.display = 'none'; /* Close the modal */
        }

        function updateStatus(requestId, status) {
            // Make an AJAX call or form submission to update the status in the backend
            console.log('Request ID:', requestId, 'Status:', status);
        }
    </script>

</body>

</html>
