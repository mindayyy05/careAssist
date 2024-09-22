<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caretaker Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-header img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            flex-grow: 1;
            padding-left: 20px;
        }

        .profile-info h2 {
            margin: 0;
            font-weight: 500;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .pricing-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .pricing-section .pricing-box {
            background-color: #f0f4fa;
            padding: 20px;
            width: 22%;
            border-radius: 8px;
            text-align: center;
        }

        .pricing-box h3 {
            margin: 10px 0;
            color: #333;
        }

        .pricing-box p {
            font-size: 16px;
            color: #777;
        }

        .specialist-care,
        .personal-care,
        .mobility-assistance,
        .house-tasks {
            margin-top: 20px;
        }

        .specialist-care h4,
        .personal-care h4,
        .mobility-assistance h4,
        .house-tasks h4 {
            font-size: 18px;
            font-weight: 500;
        }

        .tags {
            margin-top: 10px;
        }

        .tags span {
            background-color: #e7f3ff;
            color: #2a64dc;
            padding: 6px 12px;
            border-radius: 15px;
            margin-right: 10px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;

            margin-right: 700px;
        }

        .message-btn {
            background-color: #2a64dc;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .message-btn:hover {
            background-color: #1e4bb8;
        }

        .icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e7f3ff;
            padding: 10px;
            border-radius: 50%;
            text-decoration: none;
            color: #2a64dc;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .icon-btn:hover {
            background-color: #d0e9ff;
            color: #1e4bb8;
        }

        .icon-btn i {
            font-size: 20px;
        }


        .container2 {
            display: flex;
            border-radius: 8px;
            overflow: hidden;

        }

        .form-container {
            width: 38%;
            padding: 40px;
            background-color: white;
            margin-left: 130px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            width: 40%;
            background-image: url('images/ct2.webp');
            background-size: cover;
            background-position: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .input-row {
            display: flex;
            gap: 20px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 80%;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #6200ea;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .next-arrow {
            font-size: 24px;
            cursor: pointer;
            margin-left: 10px;
        }

        .slide {
            display: none;
        }

        .active {
            display: block;
        }

        .time-btn-group {
            display: flex;
            gap: 10px;
        }

        .time-btn-group .time-btn {
            padding: 10px 20px;
            background-color: #ccc;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .time-btn.active {
            background-color: #6200ea;
            color: white;
        }

        .time-btns-group {
            display: flex;
            gap: 10px;
        }

        .time-btns-group .time-btns {
            padding: 10px 20px;
            background-color: #ccc;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .time-btns.active {
            background-color: #6200ea;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/120" alt="Caretaker Image">
            <div class="profile-info">
                <h2>Lubna Jiffry</h2>
                <p>⭐ 4.9 (7 ratings)</p>
                <p>Age: 32 • 5+ years experience • Handles 45+ clients</p>
                <p>I work with the elderly and the young. I am trained to work with young adults with learning
                    disabilities. I am an excellent cook and communicator...</p>
                <div class="action-buttons">
                    <button class="message-btn">Message</button>

                    <!-- SMS Icon -->
                    <a href="sms:+1234567890" class="icon-btn" style="margin-left: 10px;">
                        <i class="fas fa-sms" style="font-size: 24px; color: #2a64dc;"></i>
                    </a>

                    <!-- Call Icon -->
                    <a href="tel:+1234567890" class="icon-btn" style="margin-left: 10px;">
                        <i class="fas fa-phone" style="font-size: 24px; color: #2a64dc;"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="pricing-section">
            <div class="pricing-box">
                <h3>Hourly</h3>
                <p>We do hourly check-up as requested from clients</p>
            </div>
            <div class="pricing-box">
                <h3>Short Notice</h3>
                <p>For your best service, please make appointments a day prior on short notice</p>
            </div>
            <div class="pricing-box">
                <h3>Overnight</h3>
                <p>Rs 1000 per 8 hours</p>
                <p>Overnight services can be provided</p>
            </div>
            <div class="pricing-box">
                <h3>Live-In</h3>
                <p>Part time: per day</p>
                <p>Full time: per week</p>
            </div>
        </div>

        <div class="specialist-care">
            <h4>Specialist Care</h4>
            <div class="tags">
                <span>Accident rehabilitation</span>
                <span>Early stage dementia</span>
                <span>Stoma care</span>
                <span>+18 more</span>
            </div>
        </div>

        <div class="personal-care">
            <h4>Personal Care</h4>
            <div class="tags">
                <span>Dressing/undressing</span>
                <span>Bathroom assistance</span>
                <span>Personal care</span>
            </div>
        </div>

        <div class="mobility-assistance">
            <h4>Mobility Assistance</h4>
            <div class="tags">
                <span>Exercise</span>
                <span>Eating and drinking assistance</span>
            </div>
        </div>

        <div class="house-tasks">
            <h4>Companionship and House Tasks</h4>
            <div class="tags">
                <span>Medical prompting</span>
                <span>Housekeeping</span>
                <span>Companionship</span>
                <span>Meal prep</span>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="form-container">
            <form action="{{ route('caretaker.store') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="patient-name">Patient Name</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div class="input-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="input-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" required>
                </div>

                <div class="input-group">
                    <label for="date">Select Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="input-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" id="start_time" name="start_time" required>
                </div>

                <div class="input-group">
                    <label for="end_time">End Time</label>
                    <input type="time" id="end_time" name="end_time" required>
                </div>

                <h2>Additional Information</h2>

                <div class="input-group">
                    <label for="allergies">Any Allergies?</label>
                    <input type="text" id="allergies" name="allergies">
                </div>

                <div class="input-group">
                    <label for="disabilities">Any Disabilities?</label>
                    <input type="text" id="disabilities" name="disabilities">
                </div>

                <div class="input-group">
                    <label>Bathing Times</label>
                    <select name="bathing_times">
                        <option value="once">Once</option>
                        <option value="twice">Twice</option>
                        <option value="depending">Depending</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Bathing Method</label>
                    <select name="bathing_method">
                        <option value="wet">Wet Bath</option>
                        <option value="dry">Dry Bath</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Meal Times</label>
                    <input type="text" name="breakfast_time" placeholder="Breakfast Time">
                    <input type="text" name="lunch_time" placeholder="Lunch Time">
                    <input type="text" name="dinner_time" placeholder="Dinner Time">
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
        <div class="image-container">
        </div>
    </div><br><br><br><br><br>

    <script>
        let currentSlide = 1;

        document.querySelectorAll('.next-btn').forEach(button => {
            button.addEventListener('click', () => {
                changeSlide(1);
            });
        });

        document.querySelectorAll('.prev-btn').forEach(button => {
            button.addEventListener('click', () => {
                changeSlide(-1);
            });
        });

        function changeSlide(direction) {
            const slides = document.querySelectorAll('.form-slide');
            slides[currentSlide - 1].classList.remove('active');
            currentSlide += direction;
            slides[currentSlide - 1].classList.add('active');
        }

        document.querySelectorAll('.time-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        document.querySelectorAll('.time-btns').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-btns').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>
