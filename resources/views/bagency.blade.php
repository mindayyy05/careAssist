<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babysitting Service</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        header {
            width: 100%;
            background-color: #f8f9fa;
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

        .banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: #f4faff;
        }

        .banner-content {
            max-width: 50%;
        }

        .banner-content h1 {
            font-size: 48px;
            color: #333;
        }

        .banner-content p {
            font-size: 18px;
            color: #777;
        }

        .availability span {
            display: inline-block;
            background-color: #0fa8cb;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .find-nanny-btn {
            background-color: #ff5a5f;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .banner-img {
            max-width: 100%;
            height: auto;
        }

        .services {
            display: flex;
            justify-content: space-around;
            padding: 50px;
            background-color: #fefefe;
        }

        .service-card1,
        .service-card2,
        .service-card3 {
            padding: 20px;
            border-radius: 10px;
            width: 25%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .service-card1 {
            background-color: #e8f4ff;
        }

        .service-card2 {
            background-color: #ffdcf8;
        }

        .service-card3 {
            background-color: #eecbf4;
        }

        .service-card h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .service-card ul {
            list-style: none;
            padding: 0;
            color: #777;
        }

        .service-card li {
            margin-bottom: 10px;
        }

        .agency-images {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
            margin-left: 80px;
            margin-right: 80px;
        }

        .agency-image {
            width: 30%;
            height: 400px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .agency-image:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }


        .top-babysitters,
        .top-agencies {

            background-color: #fefefe;
        }

        .section-title {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
        }

        .babysitter-profiles,
        .agency-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .agency-card {
            background-color: #e8f4ff;
            padding: 20px;
            border-radius: 10px;
            width: 20%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .agency-card img {
            width: 140px;
            border-radius: 50%;
        }

        .agency-card h3 {
            font-size: 20px;
            color: #333;
        }

        .agency-card p {
            font-size: 16px;
            color: #777;
        }

        .book-now-btn {
            background-color: #ff5a5f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .more-info-btn {
            background-color: #ff5a5f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            text-decoration: none;
            /* Remove underline */
            display: inline-block;
            /* Ensure button style applies correctly */
        }

        .more-info-btn:hover {
            background-color: #e14d4d;
            /* Optional: Add hover effect */
        }


        .babysitters {
            margin-top: 40px;
        }

        .babysitters h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .babysitter-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .babysitter-card {
            width: 15%;
            margin: 1%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
        }

        .babysitter-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .babysitter-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }

        .babysitter-card p {
            font-size: 16px;
            margin: 5px 0;
        }

        .book-now {
            background-color: #7eadf2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .book-now:hover {
            background-color: #0056b3;
        }


        .image-text-segment {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 80px;

        }

        .image-container {
            flex: 1;
            padding-right: 20px;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 8px;

        }

        .text-container {
            flex: 1;
            padding-left: 20px;
        }

        .text-container h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .text-container p {
            font-size: 18px;
            color: #777;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">

            <div class="hamburger-icon" onclick="toggleNav()">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48">
                    <path fill="none" stroke="#21568a" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="4" d="M7.95 11.95h32m-32 12h32m-32 12h32" />
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
        <div class="banner">

            <img src="images/babyagencybanner.jpeg" alt="Mother and Baby" class="banner-img">
        </div>
    </header>
    <main>
        <section class="services">
            <div class="service-card1">
                <h2>Location</h2><br>

                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <g fill="none" stroke="#21568a" stroke-linecap="round" stroke-width="2">
                        <path stroke-dasharray="56" stroke-dashoffset="56"
                            d="M12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4Z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="56;0" />
                        </path>
                        <path d="M12 4v0M20 12h0M12 20v0M4 12h0" opacity="0">
                            <set attributeName="opacity" begin="0.9s" to="1" />
                            <animate fill="freeze" attributeName="d" begin="0.9s" dur="0.2s"
                                values="M12 4v0M20 12h0M12 20v0M4 12h0;M12 4v-2M20 12h2M12 20v2M4 12h-2" />
                            <animateTransform attributeName="transform" dur="30s" repeatCount="indefinite"
                                type="rotate" values="0 12 12;360 12 12" />
                        </path>
                    </g>
                    <circle cx="12" cy="12" r="0" fill="#21568a" fill-opacity="0">
                        <set attributeName="fill-opacity" begin="0.6s" to="1" />
                        <animate fill="freeze" attributeName="r" begin="0.6s" dur="0.2s" values="0;4" />
                    </circle>
                </svg>
                <p style="font-size : 20px">Kirulapona</p>



            </div>
            <div class="service-card2">
                <h2>Open Days</h2><br>

                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <g fill="none" stroke="#AF2C67" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <rect width="16" height="16" x="4" y="4" stroke-dasharray="64" stroke-dashoffset="64"
                            rx="1">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s"
                                values="64;0" />
                        </rect>
                        <path stroke-dasharray="6" stroke-dashoffset="6" d="M7 4V2M17 4V2">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s"
                                values="6;0" />
                        </path>
                        <path stroke-dasharray="12" stroke-dashoffset="12" d="M7 11H17">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s"
                                values="12;0" />
                        </path>
                        <path stroke-dasharray="9" stroke-dashoffset="9" d="M7 15H14">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s"
                                values="9;0" />
                        </path>
                    </g>
                    <rect width="14" height="0" x="5" y="5" fill="#6a228c">
                        <animate fill="freeze" attributeName="height" begin="0.5s" dur="0.2s"
                            values="0;3" />
                    </rect>
                </svg>
                <p style="font-size : 20px">Monday - Saturday</p>


            </div>
            <div class="service-card3">
                <h2>Working hours</h2><br>

                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                    <path fill="#6a228c"
                        d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" />
                    <rect width="2" height="7" x="11" y="6" fill="#6a228c" rx="1">
                        <animateTransform attributeName="transform" dur="9s" repeatCount="indefinite"
                            type="rotate" values="0 12 12;360 12 12" />
                    </rect>
                    <rect width="2" height="9" x="11" y="11" fill="#6a228c" rx="1">
                        <animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite"
                            type="rotate" values="0 12 12;360 12 12" />
                    </rect>
                </svg>
                <p style="font-size : 20px">9am - 5pm</p>



            </div>
        </section>
    </main>

    <!-- New Segment with Image and Text -->
    <section class="image-text-segment">
        <div class="image-container">
            <img src="images/teddy.jpeg.png" alt="Descriptive Image">
        </div>
        <div class="text-container">
            <h2>About Our Agency</h2>
            <p>Our babysitting agency is committed to providing top-notch childcare services. Our team of experienced
                professionals is dedicated to ensuring the safety and well-being of your children. We offer flexible and
                reliable babysitting services tailored to meet your family's unique needs.</p>
        </div>
    </section>


    <div class="agency-images">
        <div class="agency-image" style="background-image: url('images/bb1.jpeg');"></div>
        <div class="agency-image" style="background-image: url('images/bb2.jpeg');"></div>
        <div class="agency-image" style="background-image: url('images/bb3.jpeg');"></div>
    </div><br><br><br>


    <section class="top-agencies">
        <div class="section-title">Our Babysitters</div>
        </div>
    </section>

    <div class="babysitters">
        <div class="babysitter-cards">
            <!-- Repeat this card for each babysitter -->
            <div class="babysitter-card">
                <img src="images/babysitter.jpeg" alt="Babysitter">
                <h3>Julia Cooper</h3>
                <p>★★★★★</p>
                <button class="book-now" onclick="window.location.href='/babysitterprofile'">Book Now</button>

            </div>

            <div class="babysitter-card">
                <img src="images/babysitter1.jpeg" alt="Babysitter">
                <h3>Katie Henry</h3>
                <p>★★★★★</p>
                <button class="book-now" onclick="window.location.href='/babysitterprofile'">Book Now</button>
            </div>
            <div class="babysitter-card">
                <img src="images/babysitter2.jpeg" alt="Babysitter">
                <h3>Heidi Klum</h3>
                <p>★★★★☆</p>
                <button class="book-now" onclick="window.location.href='/babysitterprofile'">Book Now</button>
            </div>

            <div class="babysitter-card">
                <img src="images/babysitter4.jpeg" alt="Babysitter">
                <h3>Lindsy Wren</h3>
                <p>★★★★☆</p>
                <button class="book-now" onclick="window.location.href='/babysitterprofile'">Book Now</button>
            </div>
            <div class="babysitter-card">
                <img src="images/babysitter6.jpeg" alt="Babysitter">
                <h3>Steph Papas</h3>
                <p>★★★★☆</p>
                <button class="book-now" onclick="window.location.href='/babysitterprofile'">Book Now</button>
            </div>
        </div>
    </div>
    </div><br><br><br><br>
</body>
<script>
    function toggleNav() {
        var menu = document.getElementById('side-menu');
        menu.classList.toggle('active');
    }
</script>

</html>
