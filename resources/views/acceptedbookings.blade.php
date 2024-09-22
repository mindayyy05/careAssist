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
            position: fixed;
            z-index: 1000;
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
        .view-details,
        .done {
            background-color: #18be31;
            border: none;

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

        .done {
            width: 100%;
            background-color: #3280ed;
            color: white;
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

        .icon-row {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #FFF;
        }

        .icon-item i {
            font-size: 24px;
            margin-bottom: 5px;
            color: #FFA500;
            /* Orange color for the icons */
        }

        .icon-item p {
            margin: 0;
            font-size: 14px;
            color: #FFF;
        }

        .plan-section {
            display: none;
            /* Hide the section by default */
        }



        .back-btn {
            background: none;
            border: none;
            color: #ffd500;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .back-btn i {
            margin-right: 5px;
            /* Add space between the icon and text */
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


        <h1>v View Upcoming Sessions</h1><br><br>
        <div class="dashboard">

            @foreach ($acceptedBookings as $booking)
                <div class="booking-card" id="card{{ $booking->id }}">
                    <div class="booking-info">
                        <h3>{{ $booking->childName }}</h3>
                        <p>Date: {{ $booking->bookingDate }}</p>
                        <p>Time: {{ $booking->bookingTime }}</p>
                        <p>Address: {{ $booking->houseAddress }}</p>
                    </div>
                    {{-- <button class="view-details" onclick="openModal('modal{{ $booking->id }}')">View Details</button>

                    <div class="booking-buttons">
                        <button class="accept-btn"
                            onclick="updateStatus('{{ $booking->id }}', 'accepted')">Accept</button>
                        <button class="decline-btn"
                            onclick="updateStatus('{{ $booking->id }}', 'declined')">Decline</button>

                    </div><br> --}}

                    <button class="done" onclick="markAsDone('{{ $booking->id }}')">Mark as done</button>
                    <p>Status: {{ $booking->completed_status }}</p>



                </div>
            @endforeach
        </div>

    </div>


    </div>

    <!-- Modals for Booking Details -->
    @foreach ($acceptedBookings as $booking)
        <div id="modal{{ $booking->id }}" class="modal">
            <div class="modal-content" id="modal-content">
                <button class="close-btn" onclick="closeModal('modal{{ $booking->id }}')">Close</button>
                <h2 id="modal-title">Booking Details for {{ $booking->childName }}</h2>

                <!-- Icon Row Section -->
                <div class="icon-row" id="icon-row-{{ $booking->id }}">

                    <div class="icon-item" onclick="showFeedingPlan({{ $booking->id }})">
                        <i class="fas fa-utensils"></i>
                        <p>Feeding Plan</p>
                    </div>
                    <div class="icon-item" onclick="showNapPlan({{ $booking->id }})">
                        <i class="fas fa-bed"></i>
                        <p>Nap Plan</p>
                    </div>
                    <div class="icon-item" onclick="showMedicinePlan({{ $booking->id }})">
                        <i class="fas fa-pills"></i>
                        <p>Medicine Plan</p>
                    </div>
                    <div class="icon-item" onclick="showHygienePlan({{ $booking->id }})">
                        <i class="fas fa-soap"></i> <!-- Added Hygiene Plan with soap icon -->
                        <p>Hygiene Plan</p>
                    </div>
                    <div class="icon-item" onclick="showActivityPlan({{ $booking->id }})">
                        <i class="fas fa-calendar-check"></i> <!-- Using the calendar-check icon for Activity Plan -->
                        <p>Activity Plan</p>
                    </div>

                    <div class="icon-item" onclick="showScreenTimePlan({{ $booking->id }})">
                        <i class="fas fa-tv"></i> <!-- Using the TV icon for Screen Time Plan -->
                        <p>Screen Time Plan</p>
                    </div>

                    <div class="icon-item" onclick="showBehavioralPatterns({{ $booking->id }})">
                        <i class="fas fa-brain"></i> <!-- Using the brain icon for Behavioral Patterns -->
                        <p>Behavioral Patterns</p>
                    </div>


                </div>


                <!-- feeding Plan Section -->

                <div class="plan-section" id="feeding-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Feeding Plan for {{ $booking->childName }}</h3>
                    <p>Feeding Time: {{ $booking->feedingTime }}</p>
                    <p>Details: {{ $booking->feedingDetails }}</p>
                    <p>Special Instructions: {{ $booking->specialFoodInstructions }}</p>
                </div>

                <div class="plan-section" id="napping-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Napping Plan for {{ $booking->childName }}</h3>
                    <p>Nap Time: {{ $booking->napTiming }}</p>
                    <p>Details: {{ $booking->napDetails }}</p>
                    <p>Specific Routines: {{ $booking->specificRoutines }}</p>
                </div>

                <div class="plan-section" id="medicine-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Medicine Plan for {{ $booking->childName }}</h3>
                    <p>Medicine Name: {{ $booking->medicineName }}</p>
                    <p>Dosage: {{ $booking->dosage }}</p>
                    <p>Medicine Time: {{ $booking->medicineTime }}</p>
                </div>

                <div class="plan-section" id="hygiene-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Hygiene Plan for {{ $booking->childName }}</h3>
                    <p>Bath Time: {{ $booking->bath_time1 }}</p>
                    <p>Details: {{ $booking->bath_details1 }}</p>
                    <p>Diaper Frequency: {{ $booking->diaper_frequency }}</p>
                </div>

                <div class="plan-section" id="activity-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Activity Plan for {{ $booking->childName }}</h3>
                    <p>Play Time: {{ $booking->playTime }}</p>
                    <p>Homework Time: {{ $booking->homeworkTime }}</p>
                </div>

                <div class="plan-section" id="screening-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Screen Time Plan for {{ $booking->childName }}</h3>
                    <p>Screen Time Start: {{ $booking->screenTimeStart1 }}</p>
                    <p>Screen Time End: {{ $booking->screenTimeEnd1 }}</p>
                    <p>Screen Time Rules: {{ $booking->screen_time_rules }}</p>
                </div>

                <div class="plan-section" id="behavioral-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Behavioral Patterns for {{ $booking->childName }}</h3>
                    <p>Discipline Methods: {{ $booking->discipline_methods }}</p>
                    <p>Comforting Methods: {{ $booking->comforting_methods }}</p>
                    <p>Triggers for Tantrums: {{ $booking->triggers_for_tantrums }}</p>
                    <p>Reinforcement Strategies: {{ $booking->reinforcement_strategies }}</p>
                </div>


            </div>



        </div>
    @endforeach
    </div>

    <div id="accept-modal" class="modal">
        <div class="modal-content">
            <h3>Booking Accepted</h3>
            <p>The booking has been successfully accepted and moved to Active Bookings.</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function markAsDone(bookingId) {
            fetch(`/bookings/${bookingId}/mark-as-done`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Booking marked as completed!');
                        location.reload(); // Reload the page to reflect the change
                    } else {
                        alert('Failed to update status. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function showGeneralDayPlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'block'; // Show General Day Plan section for specific booking
            document.getElementById(`feeding-plan-${bookingId}`).style.display =
                'none'; // Hide Feeding Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'General Day Plan'; // Update title for specific booking
        }

        function showFeedingPlan(bookingId) {
            showIconRow(bookingId); // Hide other sections first
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row
            document.getElementById(`feeding-plan-${bookingId}`).style.display = 'block'; // Show Feeding Plan
        }

        function showNapPlan(bookingId) {
            showIconRow(bookingId); // Hide other sections first
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row
            document.getElementById(`napping-plan-${bookingId}`).style.display = 'block'; // Show Nap Plan
        }

        function showMedicinePlan(bookingId) {
            showIconRow(bookingId);
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none';
            document.getElementById(`medicine-plan-${bookingId}`).style.display = 'block';
        }

        function showHygienePlan(bookingId) {
            showIconRow(bookingId);
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none';
            document.getElementById(`hygiene-plan-${bookingId}`).style.display = 'block';
        }

        function showActivityPlan(bookingId) {
            showIconRow(bookingId);
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none';
            document.getElementById(`activity-plan-${bookingId}`).style.display = 'block';
        }

        function showScreenTimePlan(bookingId) {
            showIconRow(bookingId);
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none';
            document.getElementById(`screening-plan-${bookingId}`).style.display = 'block';
        }

        function showBehavioralPatterns(bookingId) {
            showIconRow(bookingId);
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none';
            document.getElementById(`behavioral-plan-${bookingId}`).style.display = 'block';
        }

        function showIconRow(bookingId) {
            document.getElementById(`feeding-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`napping-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`medicine-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`hygiene-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`activity-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`screening-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`behavioral-plan-${bookingId}`).style.display = 'none';

            document.getElementById(`icon-row-${bookingId}`).style.display =
                'flex'; // Use flex or block depending on your design
        }

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
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

        function updateStatus(bookingId, status) {
            fetch(`/bookings/${bookingId}/status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Status updated successfully!');
                        location.reload(); // Refresh the page or update UI accordingly
                    } else {
                        alert('Failed to update status.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</body>

</html>
