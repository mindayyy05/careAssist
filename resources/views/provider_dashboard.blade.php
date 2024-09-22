<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .banner img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .circles {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .circle {
            width: 100px;
            height: 100px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 20px;
            position: relative;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .circle:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
        }

        .circle img {
            width: 60%;
            height: 60%;
            border-radius: 50%;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        .cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            width: 250px;
            margin: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .card .name {
            margin-top: 10px;
            font-size: 1.2em;

            text-align: center;
        }

        .card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .card:hover {
            background-color: #f9f9f9;
        }

        .popup,
        .calendar-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        .popup h3,
        .calendar-popup h3 {
            margin: 0 0 10px 0;
        }

        .popup .close-btn,
        .calendar-popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .calendar-popup {
            width: 600px;
            height: 500px;
            padding: 30px;
        }

        .calendar-popup table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar-popup th,
        .calendar-popup td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }

        .calendar-popup .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .calendar-popup .navigation button {
            padding: 5px 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        .calendar-popup .navigation button:hover {
            background-color: #555;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }

        .mark-done-btn {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4d8497;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
            text-align: center;
        }

        .mark-done-btn:hover {
            background-color: #87ceeb;
        }
    </style>
</head>

<body>

    <nav>
        Therapist Dashboard
    </nav>

    <div class="banner">
        <img src="images/providerdash.jpeg" alt="Banner">
    </div>

    <div class="circles">
        <div class="circle" id="scheduledAppointments">
            <img src="images/appointment.jpeg" alt="Scheduled Appointments">
        </div>
        <div class="circle" id="calendarIcon">
            <img src="images/calendar.jpeg" alt="Calendar">
        </div>
    </div>

    <h2>Check Scheduled Appointments</h2>

    <div class="cards">
        @foreach ($appointments as $appointment)
            <div class="card" data-patient="{{ $appointment->user_name }}" data-age="{{ $appointment->user_age }}"
                data-gender="{{ $appointment->user_gender }}" data-date="{{ $appointment->appointment_date }}"
                data-time="{{ $appointment->time_slot }}" data-reason="{{ $appointment->reason_for_therapy }}">
                <img src="images/no1.jpeg" alt="{{ $appointment->user_name }}">
                <div class="name">{{ $appointment->user_name }}</div>
                <div class="name">{{ $appointment->appointment_date }}</div>
                <button class="mark-done-btn" data-appointment-id="{{ $appointment->id }}">Mark Appointment as
                    Done</button>
            </div>
        @endforeach
    </div>

    <div class="overlay"></div>

    <div class="popup">
        <span class="close-btn">&times;</span>
        <h3>Appointment Details</h3>
        <p><strong>Name:</strong> <span id="patientName"></span></p>
        <p><strong>Age:</strong> <span id="patientAge"></span></p>
        <p><strong>Gender:</strong> <span id="patientGender"></p>
        <p><strong>Booking Date:</strong> <span id="bookingDate"></span></p>
        <p><strong>Booking Time:</strong> <span id="bookingTime"></span></p>
        <p><strong>Reason for Therapy:</strong> <span id="bookingReason"></span></p>
    </div>

    <div class="calendar-popup">
        <div class="navigation">
            <button id="prevMonth">&lt;</button>
            <h3 id="monthYear"></h3>
            <button id="nextMonth">&gt;</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody id="calendarBody"></tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const markDoneButtons = document.querySelectorAll('.mark-done-btn');

            markDoneButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const appointmentId = this.getAttribute('data-appointment-id');

                    fetch(`/appointments/${appointmentId}/complete`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Appointment marked as completed.');
                                location.reload(); // Reload the page to reflect changes
                            } else {
                                alert('Failed to update appointment status.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });

        const cards = document.querySelectorAll('.card');
        const popup = document.querySelector('.popup');
        const calendarPopup = document.querySelector('.calendar-popup');
        const overlay = document.querySelector('.overlay');
        const closeBtns = document.querySelectorAll('.close-btn');
        const calendarIcon = document.getElementById('calendarIcon');
        const calendarBody = document.getElementById('calendarBody');
        const monthYear = document.getElementById('monthYear');
        const prevMonth = document.getElementById('prevMonth');
        const nextMonth = document.getElementById('nextMonth');

        cards.forEach(card => {
            card.addEventListener('click', function() {
                const patientName = this.getAttribute('data-patient');
                const patientAge = this.getAttribute('data-age');
                const patientGender = this.getAttribute('data-gender');
                const bookingDate = this.getAttribute('data-date');
                const bookingTime = this.getAttribute('data-time');
                const bookingReason = this.getAttribute('data-reason');

                document.getElementById('patientName').textContent = patientName;
                document.getElementById('patientAge').textContent = patientAge;
                document.getElementById('patientGender').textContent = patientGender;
                document.getElementById('bookingDate').textContent = bookingDate;
                document.getElementById('bookingTime').textContent = bookingTime;
                document.getElementById('bookingReason').textContent = bookingReason;

                popup.style.display = 'block';
                overlay.style.display = 'block';
            });
        });

        overlay.addEventListener('click', () => {
            popup.style.display = 'none';
            calendarPopup.style.display = 'none';
            overlay.style.display = 'none';
        });

        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                popup.style.display = 'none';
                calendarPopup.style.display = 'none';
                overlay.style.display = 'none';
            });
        });

        calendarIcon.addEventListener('click', () => {
            calendarPopup.style.display = 'block';
            overlay.style.display = 'block';
        });

        const generateCalendar = (month, year) => {
            calendarBody.innerHTML = '';

            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            monthYear.textContent = new Date(year, month).toLocaleString('default', {
                month: 'long',
                year: 'numeric'
            });

            let date = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');
                    if (i === 0 && j < firstDay) {
                        const cellText = document.createTextNode('');
                        cell.appendChild(cellText);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const cellText = document.createTextNode(date);
                        cell.appendChild(cellText);
                        date++;
                    }
                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
            }
        }

        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        generateCalendar(currentMonth, currentYear);

        prevMonth.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        nextMonth.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });
    </script>

</body>

</html>
