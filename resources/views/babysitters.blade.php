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


        header {
            width: 100%;
            background-color: #f8f9fa;
        }


        .banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: #ecf5ff;
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
            background-color: #ff5a5f;
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
            max-width: 70%;
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

        .top-babysitters,
        .top-agencies {
            padding: 50px;
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

        .profile-card,
        .agency-card {
            background-color: #e8f4ff;
            padding: 20px;
            border-radius: 10px;
            width: 20%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .agency-card img {
            width: 140px;
            border-radius: 50%;
        }

        .profile-card h3,
        .agency-card h3 {
            font-size: 20px;
            color: #333;
        }

        .profile-card p,
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


        .caretaker-cards {
            display: flex;
            overflow-x: scroll;
            padding: 20px;
            gap: 40px;
            margin-left: 2%;
        }

        .caretaker-card {
            background-color: #f0f2ff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            padding: 20px;
            gap: 20px;
            min-width: 370px;
            align-items: center;
            transition: transform 0.3s;
        }

        .caretaker-card:hover {
            transform: scale(1.05);
        }

        .circle-image {
            border-radius: 50%;
            width: 130px;
            height: 130px;
            object-fit: cover;
        }

        .card-text {
            flex: 1;
        }

        .additional-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .info-section {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            margin: 20px 0;
            transition: background-color 0.3s;
        }

        .nm {
            margin-top: 3%;
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
            <div class="banner-content">
                <h1>Safety and Care at its best</h1>
                <p>Availability:</p>
                <div class="availability">
                    <span>Day Nanny</span>
                    <span>Night Nanny</span>

                </div>
            </div>
            <img src="images/bsbanner.jpeg" alt="Mother and Baby" class="banner-img">
        </div>
    </header>
    <main>
        <section class="services">
            <div class="service-card1">
                <h2>Baby Sitting</h2><br><svg xmlns="http://www.w3.org/2000/svg" width="3.5em" height="3.5em"
                    viewBox="0 0 256 256">
                    <path fill="#21568a"
                        d="M92 140a12 12 0 1 1 12-12a12 12 0 0 1-12 12m72-24a12 12 0 1 0 12 12a12 12 0 0 0-12-12m-12.27 45.23a45 45 0 0 1-47.46 0a8 8 0 0 0-8.54 13.54a61 61 0 0 0 64.54 0a8 8 0 0 0-8.54-13.54M232 128A104 104 0 1 1 128 24a104.11 104.11 0 0 1 104 104m-16 0a88.11 88.11 0 0 0-84.09-87.91C120.32 56.38 120 71.88 120 72a8 8 0 0 0 16 0a8 8 0 0 1 16 0a24 24 0 0 1-48 0c0-.73.13-14.3 8.46-30.63A88 88 0 1 0 216 128" />
                </svg>
                <p>
                    -Look for different agencies available<br>
                    -Choose any babysitter you may like<br>
                    -Caring at its best with our babysitters<br>
                </p>
            </div>
            <div class="service-card2">
                <h2>To-do List<br><br><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                        viewBox="0 0 26 26">
                        <path fill="#AF2C67"
                            d="M7.875 0a1 1 0 0 0-.656.375L3.812 4.656l-2.25-1.5A1.014 1.014 0 1 0 .438 4.844l3 2a1 1 0 0 0 1.344-.219l4-5A1 1 0 0 0 7.875 0M12 3v2h14V3zM7.875 9a1 1 0 0 0-.656.375l-3.407 4.281l-2.25-1.5a1.014 1.014 0 1 0-1.125 1.688l3 2a1 1 0 0 0 1.344-.219l4-5A1 1 0 0 0 7.875 9M12 12v2h14v-2zm-4.125 6a1 1 0 0 0-.656.375l-3.407 4.281l-2.25-1.5a1.014 1.014 0 1 0-1.125 1.688l3 2a1 1 0 0 0 1.344-.219l4-5A1 1 0 0 0 7.875 18M12 21v2h14v-2z" />
                    </svg></h2>
                <div class='nm'>
                    <p>
                        -Let us know about your kids activities<br>
                        -Update our babysitter on their chores<br>
                        -You can also check if it's completed<br>
                    </p>
                </div>
            </div>
            <div class="service-card3">
                <h2>Feedbacks<br><br><svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em"
                        viewBox="0 0 16 16">
                        <g fill="#6a228c">
                            <path
                                d="m4.5 1l-.5.5v1.527a4.6 4.6 0 0 1 1 0V2h9v5h-1.707L11 8.293V7H8.973a4.6 4.6 0 0 1 0 1H10v1.5l.854.354L12.707 8H14.5l.5-.5v-6l-.5-.5z" />
                            <path fill-rule="evenodd"
                                d="M6.417 10.429a3.5 3.5 0 1 0-3.834 0A4.5 4.5 0 0 0 0 14.5v.5h1v-.5a3.502 3.502 0 0 1 7 0v.5h1v-.5a4.5 4.5 0 0 0-2.583-4.071M4.5 10a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5"
                                clip-rule="evenodd" />
                        </g>
                    </svg></h2>
                <p>
                    -Send us your valuable feedbacks<br>
                    -We are always looking to improve<br>
                    -We want to be better for you!<br>
                </p>
            </div>
        </section>

        <section class="top-babysitters">
            <div class="section-title">Our Top Babysitters</div>
        </section>

        <div class="caretaker-cards">
            <div class="caretaker-card">
                <img src="images/bs1.jpeg" alt="Babysitter 1" class="circle-image">
                <div class="card-text">
                    <h3>Mindi</h3>
                    <p>Angoda Agency</p>
                    <p>⭐⭐⭐⭐⭐</p>

                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
            <div class="caretaker-card">
                <img src="images/bs2.jpeg" alt="Babysitter 2" class="circle-image">
                <div class="card-text">
                    <h3>Tharini</h3>
                    <p>Kelaniya Agency</p>
                    <p>⭐⭐⭐⭐⭐</p>

                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
            <div class="caretaker-card">
                <img src="images/bs3.jpeg" alt="Babysitter 3" class="circle-image">
                <div class="card-text">
                    <h3>Roshini</h3>
                    <p>Piliyandala Agency</p>
                    <p>⭐⭐⭐⭐⭐</p>

                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
            <div class="caretaker-card">
                <img src="images/bs4.jpeg" alt="Babysitter 4" class="circle-image">
                <div class="card-text">
                    <h3>Yashoda</h3>
                    <p>Moratuwa Agency</p>
                    <p>⭐⭐⭐⭐⭐</p>

                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
            <div class="caretaker-card">
                <img src="images/bs5.jpeg" alt="Babysitter 5" class="circle-image">
                <div class="card-text">
                    <h3>Nandini</h3>
                    <p>Kandy Agency</p>
                    <p>⭐⭐⭐⭐⭐</p>

                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
        </div><br><br>

        <section class="top-agencies">
            <div class="section-title">Babysitter Agencies to Hire From</div>
            <div class="agency-list">
                <!-- Update this section in your HTML -->
                <div class="agency-card">
                    <img src="images/bsa1.jpeg" alt="Agency 1">
                    <h3>Baby Bear Agency</h3>
                    <p>Colombo</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="{{ route('bagency') }}" class="more-info-btn">More Information</a>
                </div>

                <div class="agency-card">
                    <img src="images/bsa2.jpeg" alt="Agency 2">
                    <h3>Reese Miller</h3>
                    <p>Gampaha</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency2.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa3.jpeg" alt="Agency 3">
                    <h3>Babysitter</h3>
                    <p>Kandy</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency3.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa4.jpeg" alt="Agency 4">
                    <h3>The Babysitters inc.</h3>
                    <p>Negombo</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency4.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa5.jpeg" alt="Agency 5">
                    <h3>Little Baby</h3>
                    <p>Kurunegala</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency5.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa6.jpeg" alt="Agency 6">
                    <h3>Olivia Wilson Agency</h3>
                    <p>Ratnapura</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency6.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa7.jpeg" alt="Agency 7">
                    <h3>Babysitter Wardiere inc.</h3>
                    <p>Matara</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency7.html" class="more-info-btn">More Information</a>
                </div>
                <div class="agency-card">
                    <img src="images/bsa8.jpeg" alt="Agency 8">
                    <h3>Olivia Wilson Baby</h3>
                    <p>Jaffna</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <a href="agency8.html" class="more-info-btn">More Information</a>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    function toggleNav() {
        var menu = document.getElementById('side-menu');
        menu.classList.toggle('active');
    }
</script>

</html>
