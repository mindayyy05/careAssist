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

        .status-accepted {
            color: green;
        }

        .status-declined {
            color: red;
        }

        .meal-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            font-size: 0.9em;

        }

        .meal-box h4 {
            margin-top: 0;
            font-size: 1em;
        }


        .nap-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;

            font-size: 0.9em;
            /* Adjust font size to fit in the box */
        }

        .nap-box h4 {
            margin-top: 0;
            font-size: 1em;
            /* Slightly larger font size for headings */
        }

        .extra-details {
            font-size: 0.85em;
            /* Smaller font size for additional details */
        }

        /* Common Styles for All Boxes */
        .plan-section {
            font-size: 0.85em;
            /* Default smaller font size for readability */
        }

        /* Medicine Plan Boxes */
        .medicine-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;

        }

        /* Hygiene Plan Boxes */
        .hygiene-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;

        }

        /* Activity Plan Boxes */
        /* Activity Plan Boxes */
        .activity-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px;
            margin: 8px 0;

            font-size: 0.95em;
            /* Smaller font size for better fit */
        }



        /* Screen Time Plan Boxes */
        .screening-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;

        }

        /* Behavioral Patterns Boxes */
        .behavioral-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;

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

            @foreach ($bookings as $booking)
                <div class="booking-card" id="card{{ $booking->id }}">
                    <div class="booking-info">
                        <h3>{{ $booking->childName }}</h3>
                        <p>Date: {{ $booking->bookingDate }}</p>
                    </div>
                    <button class="view-details" onclick="openModal('modal{{ $booking->id }}')">View Details</button>

                    <div class="booking-buttons">
                        <button class="accept-btn"
                            onclick="updateStatus('{{ $booking->id }}', 'accepted')">Accept</button>
                        <button class="decline-btn"
                            onclick="updateStatus('{{ $booking->id }}', 'declined')">Decline</button>

                    </div>
                    <p>Status:
                        <span
                            class="{{ $booking->status == 'accepted' ? 'status-accepted' : ($booking->status == 'declined' ? 'status-declined' : '') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </p>

                </div>
            @endforeach
        </div>

    </div>


    </div>

    <!-- Modals for Booking Details -->
    @foreach ($bookings as $booking)
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



                    <div class="meal-box">
                        <h4>Breakfast</h4>
                        <p>Time: {{ $booking->feedingTime2 }}</p>
                        <p>Food: {{ $booking->breakfast }}</p>
                        <p>Details: {{ $booking->feedingDetails2 }}</p>
                    </div>

                    <div class="meal-box">
                        <h4>Lunch</h4>
                        <p>Time: {{ $booking->feedingTime3 }}</p>
                        <p>Food: {{ $booking->lunch }}</p>
                        <p>Details: {{ $booking->feedingDetails3 }}</p>
                    </div>

                    <div class="meal-box">
                        <h4>Dinner</h4>
                        <p>Time: {{ $booking->feedingTime4 }}</p>
                        <p>Food: {{ $booking->dinner }}</p>
                        <p>Details: {{ $booking->feedingDetails4 }}</p>
                    </div>

                    <p>Allergies: {{ $booking->allergies }}</p>
                    <p>Special Instructions: {{ $booking->specialFoodInstructions }}</p>
                </div>

                <div class="plan-section" id="napping-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Napping Plan for {{ $booking->childName }}</h3>

                    <div class="nap-box">
                        <h4>Nap Time 1</h4>
                        <p>Time: {{ $booking->napTiming }}</p>
                        <p>Details: {{ $booking->napDetails }}</p>
                    </div>

                    <div class="nap-box">
                        <h4>Nap Time 2</h4>
                        <p>Time: {{ $booking->napTiming2 }}</p>
                        <p>Details: {{ $booking->napDetails2 }}</p>
                    </div>

                    <div class="nap-box">
                        <h4>Nap Time 3</h4>
                        <p>Time: {{ $booking->napTiming3 }}</p>
                        <p>Details: {{ $booking->napDetails3 }}</p>
                    </div>

                    <div class="extra-details">
                        <p>Sleeping Preferences: {{ $booking->sleepingPreferences }}</p>
                        <p>Comfort Items: {{ $booking->comfortItems }}</p>
                        <p>Specific Routines: {{ $booking->specificRoutines }}</p>
                        <p>White Noise: {{ $booking->whiteNoise }}</p>
                    </div>
                </div>


                <!-- Medicine Plan -->
                <div class="plan-section" id="medicine-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Medicine Plan for {{ $booking->childName }}</h3>

                    <div class="medicine-box">
                        <h4>Medicine 1</h4>
                        <p>Name: {{ $booking->medicine_name1 }}</p>
                        <p>Time: {{ $booking->dosage1 }}</p>
                        <p>Dosage: {{ $booking->medicine_time1 }}</p>
                    </div>

                    <div class="medicine-box">
                        <h4>Medicine 2</h4>
                        <p>Name: {{ $booking->medicine_name2 }}</p>
                        <p>Time: {{ $booking->dosage2 }}</p>
                        <p>Dosage: {{ $booking->medicine_time2 }}</p>
                    </div>

                    <div class="medicine-box">
                        <h4>Medicine 3</h4>
                        <p>Name: {{ $booking->medicine_name3 }}</p>
                        <p>Time: {{ $booking->dosage3 }}</p>
                        <p>Dosage: {{ $booking->medicine_time3 }}</p>
                    </div>
                </div>

                <!-- Hygiene Plan -->
                <div class="plan-section" id="hygiene-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Hygiene Plan for {{ $booking->childName }}</h3>

                    <div class="hygiene-box">
                        <h4>Bath Time 1</h4>
                        <p>Time: {{ $booking->bath_time1 }}</p>
                        <p>Details: {{ $booking->bath_details1 }}</p>
                    </div>

                    <div class="hygiene-box">
                        <h4>Bath Time 2</h4>
                        <p>Time: {{ $booking->bath_time2 }}</p>
                        <p>Details: {{ $booking->bath_details2 }}</p>
                    </div>

                    <div class="hygiene-box">
                        <h4>Bath Time 3</h4>
                        <p>Time: {{ $booking->bath_time3 }}</p>
                        <p>Details: {{ $booking->bath_details3 }}</p>
                    </div>

                    <div class="extra-details">
                        <p>Shampoo: {{ $booking->shampoo }}</p>
                        <p>Soap: {{ $booking->soap }}</p>
                        <p>Diaper Frequency: {{ $booking->diaper_frequency }}</p>
                        <p>Specific Products for Diaper Change: {{ $booking->diaper_specific_products }}</p>
                        <p>Oral Products: {{ $booking->oral_products }}</p>
                    </div>
                </div>

                <!-- Activity Plan -->
                <div class="plan-section" id="activity-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Activity Plan for {{ $booking->childName }}</h3>

                    <div class="activity-box">
                        <h4>Task 1</h4>
                        <p>Description: {{ $booking->taskDescription }}</p>
                        <p>Time: {{ $booking->taskTime }}</p>
                    </div>

                    <div class="activity-box">
                        <h4>Task 2</h4>
                        <p>Description: {{ $booking->taskDescription2 }}</p>
                        <p>Time: {{ $booking->taskTime2 }}</p>
                    </div>

                    <div class="activity-box">
                        <h4>Task 3</h4>
                        <p>Description: {{ $booking->taskDescription3 }}</p>
                        <p>Time: {{ $booking->taskTime3 }}</p>
                    </div>

                    <div class="activity-box">
                        <h4>Task 4</h4>
                        <p>Description: {{ $booking->taskDescription4 }}</p>
                        <p>Time: {{ $booking->taskTime4 }}</p>
                    </div>

                    <div class="activity-box">
                        <h4>Task 5</h4>
                        <p>Description: {{ $booking->taskDescription5 }}</p>
                        <p>Time: {{ $booking->taskTime5 }}</p>
                    </div>
                </div>

                <!-- Screen Time Plan -->
                <div class="plan-section" id="screening-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Screen Time Plan for {{ $booking->childName }}</h3>

                    <div class="screening-box">
                        <h4>Screen Time 1</h4>
                        <p>Start: {{ $booking->screenTimeStart1 }}</p>
                        <p>End: {{ $booking->screenTimeEnd1 }}</p>
                    </div>

                    <div class="screening-box">
                        <h4>Screen Time 2</h4>
                        <p>Start: {{ $booking->screenTimeStart2 }}</p>
                        <p>End: {{ $booking->screenTimeEnd2 }}</p>
                    </div>

                    <div class="extra-details">
                        <p>Screen Time Rules: {{ $booking->screen_time_rules }}</p>
                    </div>
                </div>

                <!-- Behavioral Patterns -->
                <div class="plan-section" id="behavioral-plan-{{ $booking->id }}" style="display: none;">
                    <button class="back-btn" onclick="showIconRow({{ $booking->id }})">
                        <i class="fas fa-arrow-left"></i> <!-- Back icon -->
                    </button>
                    <h3>Behavioral Patterns for {{ $booking->childName }}</h3>

                    <div class="behavioral-box">
                        <h4>Discipline Methods</h4>
                        <p>{{ $booking->discipline_methods }}</p>
                    </div>

                    <div class="behavioral-box">
                        <h4>Comforting Methods</h4>
                        <p>{{ $booking->comforting_methods }}</p>
                    </div>

                    <div class="behavioral-box">
                        <h4>Triggers for Tantrums</h4>
                        <p>{{ $booking->triggers_for_tantrums }}</p>
                    </div>

                    <div class="behavioral-box">
                        <h4>Reinforcement Strategies</h4>
                        <p>{{ $booking->reinforcement_strategies }}</p>
                    </div>
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
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`feeding-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Feeding Plan'; // Update title for specific booking
        }

        function showNapPlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`napping-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Napping Plan'; // Update title for specific booking
        }


        function showMedicinePlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`medicine-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Medicine Plan'; // Update title for specific booking
        }

        function showHygienePlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`hygiene-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Hygiene Plan'; // Update title for specific booking
        }

        function showActivityPlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`activity-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Activity Plan'; // Update title for specific booking
        }

        function showScreenTimePlan(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`screening-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Screen Time Plan'; // Update title for specific booking
        }

        function showBehavioralPatterns(bookingId) {
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row for specific booking
            document.getElementById(`behavioral-plan-${bookingId}`).style.display =
                'block'; // Show Feeding Plan section for specific booking
            document.getElementById(`general-day-plan-${bookingId}`).style.display =
                'none'; // Hide General Day Plan section if visible
            document.getElementById(`modal-title-${bookingId}`).innerText =
                'Behavioral Patterns'; // Update title for specific booking
        }

        function showIconRow(bookingId) {
            // Hide all the plan sections
            document.getElementById(`feeding-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`napping-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`medicine-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`hygiene-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`activity-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`screening-plan-${bookingId}`).style.display = 'none';
            document.getElementById(`behavioral-plan-${bookingId}`).style.display = 'none';

            // Show the icon row
            document.getElementById(`icon-row-${bookingId}`).style.display =
                'flex'; // Use flex or block depending on your design
        }

        // Update existing functions to hide all sections except the one being displayed
        function showFeedingPlan(bookingId) {
            showIconRow(bookingId); // Hide other sections first
            document.getElementById(`icon-row-${bookingId}`).style.display = 'none'; // Hide icon row
            document.getElementById(`feeding-plan-${bookingId}`).style.display = 'block'; // Show Feeding Plan
        }

        // Repeat this pattern for all other show functions
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
