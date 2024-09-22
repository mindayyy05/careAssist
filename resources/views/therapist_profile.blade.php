<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Add SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Doctor Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(51, 51, 51, 0.8);
            padding: 10px 20px;
            position: relative;
            width: 100%;
            top: 0;
            z-index: 1000;
            height: 80px box-sizing: border-box;
            margin-top: -1%;
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

        /* Styles for the hamburger icon */
        .hamburger-icon {
            display: none;
            cursor: pointer;
        }

        /* Styles for the side menu */
        .side-menu {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease;
        }

        .side-menu ul {
            list-style: none;
            padding: 20px;
        }

        .side-menu ul li {
            margin: 20px 0;
        }

        .side-menu ul li a {
            text-decoration: none;
            color: #21568a;
        }

        .side-menu.active {
            left: 0;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {

            .navbar .left,
            .navbar .right {
                display: none;
            }

            .hamburger-icon {
                display: block;
                margin-right: 20px;
            }

            .explore-button {
                display: none;
            }
        }

        .main-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            margin: 20px;
            padding: 20px;
            margin-left: 100px;
            margin-right: 100px;
        }

        .doctor-image {
            width: 300px;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
        }

        .doctor-info {
            flex: 1;
        }

        .doctor-info-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .doctor-info-card h2 {
            margin-top: 0;
        }

        .doctor-info-card button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .doctor-info-card button:hover {
            background-color: #0056b3;
        }

        .reviews-card {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .reviews-card h3 {
            margin-top: 0;
        }

        .review {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .review:last-child {
            border-bottom: none;
        }

        .review p {
            margin: 5px 0;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            /* Increased padding for better spacing */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 650px;
            /* Increased width from 400px to 450px */
            max-height: 80vh;
            overflow-y: auto;
            text-align: center;
            overflow-x: hidden;
            /* Prevent horizontal scroll */
        }

        #calendar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        #calendar {
            display: flex;
            justify-content: space-around;
            width: 80%;
        }

        #calendar div {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
            flex-direction: column;
        }

        #calendar div:hover {
            background-color: #f0f0f0;
        }

        #time-slots {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        #time-slots div {
            width: 70px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            font-size: 12px;
            text-align: center;
        }

        #time-slots div.selected {
            background-color: #007bff;
            color: white;
        }

        #confirm-booking,
        #close-popup {
            margin-top: 15px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #confirm-booking:hover,
        #close-popup:hover {
            background-color: #0056b3;
        }

        #calendar div.booked {
            background-color: red;
            color: white;
        }

        .doctor-info-card {
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 1190px;
        }

        h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #000000;
            text-align: center;
        }

        #booked-slots-table {
            width: 100%;
            border-collapse: collapse;
        }

        #booked-slots-table th,
        #booked-slots-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        #booked-slots-table thead {
            background-color: #007BFF;
            color: #fff;
        }

        #booked-slots-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #booked-slots-table tbody tr:hover {
            background-color: #ddd;
        }

        #booked-slots-table th {
            font-size: 16px;
        }

        #booked-slots-table td {
            font-size: 14px;
        }

        .popup-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: left;
            margin: 0 auto;
            max-width: 350px;
        }

        .popup-content form label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .popup-content form input,
        .popup-content form select,
        .popup-content form textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .popup-content form input[type="text"],
        .popup-content form input[type="email"],
        .popup-content form input[type="tel"],
        .popup-content form input[type="date"],
        .popup-content form select {
            width: 100%;
        }

        .popup-content form textarea {
            resize: vertical;
            width: 100%;
            height: 80px;
        }

        .popup-content form .form-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .popup-content form .form-row input,
        .popup-content form .form-row select {
            width: 100%;
        }

        .reviews-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

        .reviews-card h3 {
            margin-top: 0;
            font-size: 24px;
            color: #007bff;
        }

        #add-feedback-box {
            margin-top: 20px;
            text-align: center;
        }

        #add-feedback-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        #add-feedback-button:hover {
            background-color: #0056b3;
        }

        /* Popup Overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            max-height: 80vh;
            overflow-y: auto;
            text-align: center;
        }

        #feedback-popup {

            justify-content: center;
            align-items: center;
        }




        .popup-content h2 {
            margin-top: 0;
            color: #000000;
        }

        .popup-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: left;
            margin: 0 auto;
            max-width: 450px;
        }

        .popup-content form .form-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .popup-content form label {
            font-weight: bold;
            color: #333;
        }

        .popup-content form input,
        .popup-content form textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .popup-content form textarea {
            resize: vertical;
            height: 80px;
        }

        .popup-content form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .popup-content form button:hover {
            background-color: #0056b3;
        }

        .popup-content #close-feedback-popup {
            background-color: #6c757d;
        }

        .popup-content #close-feedback-popup:hover {
            background-color: #5a6268;
        }

        .feedback-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .feedback-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 280px;
        }

        /* Style for name field */
        #user-name {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Style for age field */
        #user-age {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Style for gender field */
        #user-gender {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .row {
            display: flex;
            gap: 10px;
            margin-top: 3%;
            /* Space between the fields */
        }

        /* Style for age and gender columns */
        .col {
            flex: 1;
            /* Equal width for both columns */
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <div class="navbar">

        <div class="hamburger-icon" onclick="toggleNav()">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48">
                <path fill="none" stroke="#21568a" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                    d="M7.95 11.95h32m-32 12h32m-32 12h32" />
            </svg>
        </div>
        <!-- Side Menu -->
        <div id="side-menu" class="side-menu">
            <ul>
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
        </div>

        <div class="left">
            <div class="logo">
                <img src="{{ asset('images/careassist_logo copy.jpeg.png') }}" alt="Logo">
            </div>
            <a href="{{ url('/dashboard') }}">Home</a>
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


    <!-- Main Card -->
    <div class="main-card">
        <img src="images/therapist1.jpeg" alt="Doctor Image" class="doctor-image">
        <div class="doctor-info">
            <div class="doctor-info-card">
                <h2>Dr. Bernadette Carr</h2>
                <p>M.Sc - Anatomy</p>
                <p>General Physician, 12 Years Experience</p>
                <p>Dr. Bernadette has served in a variety of clinical branches and has extensive clinical experience.
                    She has worked in the Dept. of surgery, Dept. of Gynaecology and Dept. of Medicine.</p>
                <p>Working with Moonstone Agency</p>
                <p>Dr. Bernadette has served in a variety of clinical branches and has extensive clinical experience.
                    She has worked in the Dept. of surgery, Dept. of Gynaecology and Dept. of Medicine.</p>
                <p>Working with Moonstone Agency</p><br>

                <button id="book-now-button">Book now</button>
            </div>

            <!-- New Card for Already Booked Time Slots -->

        </div>

    </div>
    <div class="doctor-info-card">
        <h3>Already Booked Time Slots</h3>
        <table id="booked-slots-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->time_slot }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No appointments booked yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>




    <!-- Appointment Pop-up -->
    <div id="appointment-popup" class="popup-overlay">
        <div class="popup-content">

            <h3>Personal Information</h3>

            <label for="user-name" class="name">Name:</label>
            <input type="text" id="user-name" required><br>

            <div class="row">
                <div class="col">

                    <label for="user-age">Age:</label>
                    <input type="number" id="user-age" min="1" required><br><br>
                </div>

                <div class="col">
                    <label for="user-gender">Gender:</label>
                    <select id="user-gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <h3>Select Date</h3>
            <div id="calendar-container">
                <button id="prev-week">←</button>
                <div id="calendar">
                    <!-- Calendar days will be dynamically generated here -->
                </div>
                <button id="next-week">→</button>
            </div>

            <h3>Select Time</h3>
            <div id="time-slots">
                <!-- Time slots will be dynamically generated here -->
            </div>

            <h3>Why do you think you need therapy?</h3>
            <textarea id="therapy-reason" rows="4" cols="50"></textarea>

            <button id="confirm-booking">Book Appointment</button>
        </div>
    </div>


    <!-- Confirmation Pop-up -->
    <div id="confirmation-popup" class="popup-overlay">
        <div class="popup-content">
            <h2>Your appointment has been scheduled</h2>
            <button id="close-confirmation">Close</button>
        </div>
    </div>

    <!-- Reviews and Feedback Section -->



    <!-- Reviews and Feedback Section -->
    <div class="reviews-card">
        <h3>Reviews and Feedback</h3>

        <!-- Feedback Cards Row -->
        <div class="feedback-cards">
            @forelse($feedbacks as $feedback)
                <div class="feedback-card">
                    <p><strong>Name:</strong> {{ $feedback->name }}</p>
                    <p><strong>Feedback:</strong> {{ $feedback->feedback }}</p>
                    <p><strong>Date:</strong> {{ $feedback->created_at->format('F j, Y') }}</p>
                </div>
            @empty
                <p>No feedback available yet.</p>
            @endforelse
        </div>

        <!-- Add Feedback Form -->
        <div id="add-feedback-box">
            <button id="add-feedback-button">+ Add Feedback</button>
        </div>

        <!-- Feedback Popup Form -->
        <div id="feedback-popup" class="popup-overlay">
            <div class="popup-content">
                <h2>Add Feedback</h2>
                <form id="feedback-form" action="{{ route('submit-feedback') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <label for="feedback-name">Name:</label>
                        <input type="text" id="feedback-name" name="name" required>
                    </div>
                    <div class="form-row">
                        <label for="feedback-text">Feedback:</label>
                        <textarea id="feedback-text" name="feedback" required></textarea>
                    </div>
                    <button type="submit">Submit</button>
                    <button type="button" id="close-feedback-popup">Close</button>
                </form>
            </div>
        </div>

    </div>




    <!-- Success Message Popup -->
    <div id="success-popup" class="popup-overlay hidden">
        <div class="popup-content">
            <h2>Thank you for your feedback!</h2>
            <button id="close-success-popup">Close</button>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const bookNowButton = document.getElementById("book-now-button");
            const appointmentPopup = document.getElementById("appointment-popup");
            const confirmBookingButton = document.getElementById("confirm-booking");
            const confirmationPopup = document.getElementById("confirmation-popup");
            const closeConfirmationButton = document.getElementById("close-confirmation");
            const calendar = document.getElementById("calendar");
            const prevWeekButton = document.getElementById("prev-week");
            const nextWeekButton = document.getElementById("next-week");
            const timeSlots = document.getElementById("time-slots");

            const errorDisplay = document.createElement('div');
            errorDisplay.id = 'error-message';
            errorDisplay.style.color = 'red';
            errorDisplay.style.marginTop = '10px';
            document.querySelector('.popup-content').insertBefore(errorDisplay, document.getElementById(
                'confirm-booking'));

            let selectedDate = null;
            let selectedTime = null;

            // Set the current week start to Monday, July 29, 2024
            let currentWeekStart = new Date(2024, 7, 19); // Month is zero-indexed, so 6 = July

            bookNowButton.addEventListener("click", () => {
                appointmentPopup.style.display = "flex";
                generateCalendar();
                generateTimeSlots();
            });

            confirmBookingButton.addEventListener("click", () => {
                if (selectedDate && selectedTime) {
                    const userName = document.getElementById("user-name").value;
                    const userAge = document.getElementById("user-age").value;
                    const userGender = document.getElementById("user-gender").value;
                    const reasonForTherapy = document.getElementById("therapy-reason").value;
                    const therapistId = 1; // Replace this with the actual therapist ID

                    // Add one day to the selected date
                    const appointmentDate = new Date(selectedDate);
                    appointmentDate.setDate(appointmentDate.getDate() + 1);

                    // Debugging: Log the updated date and time
                    console.log('Selected Date:', selectedDate);
                    console.log('Updated Date:', appointmentDate);
                    console.log('Selected Time:', selectedTime);
                    console.log('User Name:', userName);
                    console.log('User Age:', userAge);
                    console.log('User Gender:', userGender);

                    fetch('{{ route('book-appointment') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                therapist_id: 1,
                                appointment_date: appointmentDate.toISOString().split('T')[0],
                                time_slot: selectedTime,
                                reason_for_therapy: reasonForTherapy,
                                user_name: userName,
                                user_age: userAge,
                                user_gender: userGender
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                errorDisplay.textContent = data.error;
                            } else {
                                confirmationPopup.style.display = "flex";
                                appointmentPopup.style.display = "none";
                                errorDisplay.textContent = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            errorDisplay.textContent =
                                'An error occurred! Please add valid inputs to the form fields and try again.';
                        });

                } else {
                    errorDisplay.textContent = "Please select a date and time slot.";
                }
            });

            closeConfirmationButton.addEventListener("click", () => {
                confirmationPopup.style.display = "none";
            });

            prevWeekButton.addEventListener("click", () => {
                currentWeekStart.setDate(currentWeekStart.getDate() - 7);
                generateCalendar();
            });

            nextWeekButton.addEventListener("click", () => {
                currentWeekStart.setDate(currentWeekStart.getDate() + 7);
                generateCalendar();
            });

            function generateCalendar() {
                calendar.innerHTML = "";
                const weekDays = ["Mon", "Tue", "Wed", "Thu", "Fri"];
                const startOfWeek = new Date(currentWeekStart);
                const today = new Date();

                weekDays.forEach((day, index) => {
                    const dayDate = new Date(startOfWeek);
                    dayDate.setDate(startOfWeek.getDate() + index);

                    const dayElement = document.createElement("div");
                    dayElement.innerHTML = `<div>${day}</div><div>${dayDate.getDate()}</div>`;
                    dayElement.title =
                        `${day} ${dayDate.getDate()}/${dayDate.getMonth() + 1}/${dayDate.getFullYear()}`;

                    // Highlight today's date
                    if (dayDate.toDateString() === today.toDateString()) {
                        dayElement.style.border = "2px solid #007bff";
                    }

                    // Highlight July 31st in red
                    if (dayDate.getDate() === 31 && dayDate.getMonth() ===
                        6) { // July is month 6 (0-indexed)
                        dayElement.style.backgroundColor = "red";
                        dayElement.style.color = "white";
                    }

                    dayElement.addEventListener("click", () => {
                        selectedDate = dayDate;
                        document.querySelectorAll("#calendar div").forEach(el => {
                            el.style.backgroundColor = "";
                            el.style.color = "black";
                        });
                        dayElement.style.backgroundColor = "#007bff";
                        dayElement.style.color = "white";
                    });

                    calendar.appendChild(dayElement);
                });
            }

            function generateTimeSlots() {
                timeSlots.innerHTML = "";
                const startTime = 9; // 9 AM
                const endTime = 17; // 5 PM
                for (let i = startTime; i < endTime; i++) {
                    const timeSlotElement = document.createElement("div");
                    timeSlotElement.innerText = `${i}:00 - ${i + 1}:00`;
                    timeSlotElement.addEventListener("click", () => {
                        selectedTime = `${i}:00 - ${i + 1}:00`;
                        document.querySelectorAll("#time-slots div").forEach(el => el.classList.remove(
                            "selected"));
                        timeSlotElement.classList.add("selected");
                    });
                    timeSlots.appendChild(timeSlotElement);
                }
            }
        });


        const addFeedbackButton = document.getElementById("add-feedback-button");
        const feedbackPopup = document.getElementById("feedback-popup");
        const closeFeedbackPopupButton = document.getElementById("close-feedback-popup");
        const feedbackForm = document.getElementById("feedback-form");

        addFeedbackButton.addEventListener("click", () => {
            feedbackPopup.style.display = "flex";
        });

        closeFeedbackPopupButton.addEventListener("click", () => {
            feedbackPopup.style.display = "none";
        });

        feedbackForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('/submit-feedback', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Thank you for your feedback!');
                        feedbackPopup.style.display = 'none';
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });


        document.getElementById('add-feedback-button').addEventListener('click', function() {
            document.getElementById('feedback-popup').style.display = 'block';
        });

        document.getElementById('close-feedback-popup').addEventListener('click', function() {
            document.getElementById('feedback-popup').style.display = 'none';
        });

        function toggleNav() {
            var menu = document.getElementById('side-menu');
            menu.classList.toggle('active');
        }
    </script>


</body>

</html>
