<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moonstone - Care Assist</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #ffffff;
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




        .container {
            padding: 20px;
            text-align: center;
        }

        .banner {
            width: 104%;
            height: auto;
            margin-left: -40px;
            margin-top: -20px;
        }

        .class h1 {
            color: #003366;
            /* Dark Blue Color */
            font-family: 'Open Sans', sans-serif;
            /* Make sure to use a good font */
            border-bottom: 2px solid #003366;
            /* Line under the heading */
            padding-bottom: 10px;
            display: inline-block;
            margin-bottom: 30px;
            /* Adjust margin as needed */
        }

        .doctor-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .doctor-card {
            background-color: #f8f9fa;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            width: 23%;
            box-sizing: border-box;
            text-align: left;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .doctor-card img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            float: left;
            margin-right: 15px;
        }

        .doctor-card .name {
            font-size: 1.2em;
            font-weight: bold;
        }

        .doctor-card .agency {
            font-size: 1em;
            color: #666;
        }

        .doctor-card .qualifications {
            font-size: 0.9em;
            color: #999;
        }

        .doctor-card button {
            background-color: #24619e;
            /* Dark Blue */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
            clear: both;
            margin-left: 40px;
        }

        .doctor-card button:hover {
            background-color: #002244;
            /* Darker Blue */
        }

        footer {
            background-color: #89CFF0;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .map-section {
            margin-top: 30px;
            text-align: center;
        }

        .map-section h2 {
            color: #003366;
            font-family: 'Open Sans', sans-serif;
            margin-bottom: 20px;
        }

        .map-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
    </style>
</head>

<body>

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



    <div class="container">
        <img src="images/moonstone-banner.jpeg" alt="Banner" class="banner"><br><br>

        <div class="class">
            <h1>Our Doctors</h1>
        </div>

        <div class="doctor-cards">
            <!-- Doctor Card 1 -->
            <div class="doctor-card">
                <img src="images/therapist1.jpeg" alt="Dr. Awantha Rathnayake">
                <div class="details">
                    <div class="name">Dr. Awantha Rathnayake</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Counseling)</div>
                    <button id="schedule-appointment-button"
                        onclick="location.href='{{ url('/therapist-profile') }}'">Schedule an appointment</button>
                </div>
            </div>

            <!-- Doctor Card 2 -->
            <div class="doctor-card">
                <img src="images/therapist2.jpeg" alt="Dr. Chamath Jayasinghe">
                <div class="details">
                    <div class="name">Dr. Chamath Jayasinghe</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychiatry)</div>
                    <button onclick="location.href='doctor2.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 3 -->
            <div class="doctor-card">
                <img src="images/therapist3.jpeg" alt="Dr. Dilan Wickramasinghe">
                <div class="details">
                    <div class="name">Dr. Dilan Wickramasinghe</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychology)</div>
                    <button onclick="location.href='doctor3.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 4 -->
            <div class="doctor-card">
                <img src="images/therapist4.jpeg" alt="Dr. Eranga Bandara">
                <div class="details">
                    <div class="name">Dr. Eranga Bandara</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Counseling)</div>
                    <button onclick="location.href='doctor4.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 5 -->
            <div class="doctor-card">
                <img src="images/therapist5.jpeg" alt="Dr. Gayantha Perera">
                <div class="details">
                    <div class="name">Dr. Gayantha Perera</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychiatry)</div>
                    <button onclick="location.href='doctor5.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 6 -->
            <div class="doctor-card">
                <img src="images/therapist6.jpeg" alt="Dr. Harshana Silva">
                <div class="details">
                    <div class="name">Dr. Harshana Silva</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychology)</div>
                    <button onclick="location.href='doctor6.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 7 -->
            <div class="doctor-card">
                <img src="images/therapist7.jpeg" alt="Dr. Ishara Fernando">
                <div class="details">
                    <div class="name">Dr. Ishara Fernando</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Counseling)</div>
                    <button onclick="location.href='doctor7.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 8 -->
            <div class="doctor-card">
                <img src="images/therapist8.jpeg" alt="Dr. Janaka Weerasinghe">
                <div class="details">
                    <div class="name">Dr. Janaka Weerasinghe</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychiatry)</div>
                    <button onclick="location.href='doctor8.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 9 -->
            <div class="doctor-card">
                <img src="images/therapist9.jpeg" alt="Dr. Kasun Perera">
                <div class="details">
                    <div class="name">Dr. Kasun Perera</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychology)</div>
                    <button onclick="location.href='doctor9.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 10 -->
            <div class="doctor-card">
                <img src="images/therapist10.jpeg" alt="Dr. Lanka Silva">
                <div class="details">
                    <div class="name">Dr. Lanka Silva</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Counseling)</div>
                    <button onclick="location.href='doctor10.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 11 -->
            <div class="doctor-card">
                <img src="images/therapist11.jpeg" alt="Dr. Madawa Weerasinghe">
                <div class="details">
                    <div class="name">Dr. Madawa Weerasinghe</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychiatry)</div>
                    <button onclick="location.href='doctor11.html'">Schedule an appointment</button>
                </div>
            </div>
            <!-- Doctor Card 12 -->
            <div class="doctor-card">
                <img src="images/therapist12.jpeg" alt="Dr. Nalin Wickramasinghe">
                <div class="details">
                    <div class="name">Dr. Nalin Wickramasinghe</div>
                    <div class="agency">Moonstone</div>
                    <div class="qualifications">MBBS, MD (Psychology)</div>
                    <button onclick="location.href='doctor12.html'">Schedule an appointment</button>
                </div>
            </div>
        </div>

        <!-- Our Location Section -->
        <div class="map-section">
            <h2>Our Location</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63257.41970106673!2d79.9582033!3d6.9270789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259d12a77a66b%3A0x6abcf891b08b7fc9!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1699253643915!5m2!1sen!2sus"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    </div>

    <footer>
        <p>Contact us at Moonstone for more information</p>
    </footer>
</body>
<script>
    function toggleNav() {
        var menu = document.getElementById('side-menu');
        menu.classList.toggle('active');
    }
</script>

</html>
