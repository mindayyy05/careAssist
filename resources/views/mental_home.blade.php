<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Assist</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">body {
            font-family: 'Open Sans', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;

        }


        body {
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
            width: 100vw;
            /* Full viewport width */
            height: auto;
            margin: 0;
            margin-left: -2%;
            /* Remove any default margins */
            padding: 0;
            /* Remove any default padding */
            margin-top: -300px;
            object-fit: cover;
            /* Ensures the image covers the entire container */
            object-position: center top;
            /* Aligns the image to the top, trimming from the bottom */
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

        .section {
            display: flex;
            justify-content: space-between;
            padding: 40px 0;
        }

        .helpline-card {
            background-color: #ffe6e6;
            /* Very light red color */

            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            width: 23%;
            box-sizing: border-box;
            text-align: left;
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
            /* Initial border */
            animation: glowing-border 2s infinite;
            /* Add glowing animation */
        }

        @keyframes glowing-border {
            0% {
                border-color: red;
                box-shadow: 0 0 5px red;
            }

            50% {
                border-color: transparent;
                box-shadow: 0 0 20px red;
            }

            100% {
                border-color: red;
                box-shadow: 0 0 5px rgb(255, 0, 0);
            }
        }

        .helpline-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .helpline-card .service-name {
            font-size: 1.2em;
            font-weight: bold;
        }

        .helpline-card .number {
            font-size: 1em;
        }

        .helpline-card button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: white;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
        }

        .helpline-card button:hover {
            background-color: #5a9bd8;
        }

        .helpline-card button i {
            font-size: 1.2em;
        }


        .news-section {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .news-section img {
            width: 23%;
            border-radius: 20px;
            margin-right: 10px;
            margin-left: -5%;
        }

        .news-card {
            background-color: #d0e7ff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            width: 50%;
            text-align: left;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-left: 40px;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .news-card button {
            background-color: #003366;
            /* Dark Blue */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
        }

        .news-card button:hover {
            background-color: #002244;
            /* Darker Blue */
        }

        .appointment-section {
            padding: 40px 0;

        }

        .appointment-section h2 {
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

        .agency-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color: #f6f6f6;
        }

        .agency-card {
            flex: 1 1 22%;
            /* Adjust the percentage to control the width of the cards */
            box-sizing: border-box;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .agency-card:hover {
            transform: scale(1.05);
        }

        .agency-card img {
            width: 100px;
            /* Adjust as needed */
            height: 100px;
            /* Adjust as needed */
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .details .name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .details .address {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 5px;
        }

        .details .ratings {
            margin-bottom: 10px;
        }

        .details button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .details button:hover {
            background-color: #0056b3;
        }


        .reminders-section {
            text-align: center;
            padding: 40px 0;
        }

        .reminders-section h2 {
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
            text-shadow: 0 0 10px rgba(0, 51, 102, 0.8);
            /* Glowing effect */
            animation: glow 1.5s infinite alternate;
            /* Animation for glowing effect */
        }

        .reminder-images {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .reminder-images img {
            width: 30%;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 0 10px;
        }

        .reminder-images img:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px rgba(170, 210, 230, 0.5);
            }

            to {
                text-shadow: 0 0 20px rgba(0, 51, 102, 1);
            }
        }

        .articles-section {
            padding: 40px 0;
            background-color: #ffffff;
            /* Background color for the section */
        }

        .articles-section h2 {
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
            text-align: center;
        }

        .articles-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .articles-section {
            padding: 40px;
            background-color: #eeeeee;
            /* Background color for the section */
        }

        .articles-section h2 {
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

        .article {
            background-color: #fff2ed;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .article a {
            color: #003366;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .article a:hover {
            text-decoration: underline;
        }

        .article p {
            font-size: 0.9em;
            color: #666;
        }

        .articles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .article {
            width: 48%;
            box-sizing: border-box;
        }

        footer {
            background-color: #89CFF0;
            color: white;
            text-align: center;
            padding: 10px 0;
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
        <div class="banner-container">
            <img src="images/mentall.png" alt="Banner Image" class="banner">
        </div>

        <div class="class">
            <h1>Immediate Helplines</h1>
        </div>

        <div class="section">
            <div class="helpline-card">
                <div class="service-name">National Health Service</div><br>
                <div class="number">0112 695 211</div>
                <button id="nhs-call-button" onclick="location.href='tel:0112695211'">
                    <i class="fa fa-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="#CD4242"
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                        </svg>
                    </i>
                </button>
            </div>

            <div class="helpline-card">
                <div class="service-name">Mental Health Helpline</div><br>
                <div class="number">1926</div>
                <button onclick="location.href='tel:1926'"><i class="fa fa-phone"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="#CD4242"
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                        </svg></i></button>
            </div>
            <div class="helpline-card">
                <div class="service-name">Suicide Prevention</div><br>
                <div class="number">1333</div>
                <button onclick="location.href='tel:1333'"><i class="fa fa-phone"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="#CD4242"
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                        </svg></i></button>
            </div>
            <div class="helpline-card">
                <div class="service-name">Child Helpline</div><br>
                <div class="number">1929</div>
                <button onclick="location.href='tel:1929'"><i class="fa fa-phone"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="#CD4242"
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                        </svg></i></button>
            </div>
        </div>




        <div class="appointment-section">
            <h2>Book an appointment!</h2>
            <div class="agency-cards">

                <!-- Agency Card 1 -->

                <div class="agency-card">
                    <img src="images/moonstone.jpeg" alt="Agency 1">
                    <div class="details">
                        <div class="name">Moonstone</div>
                        <div class="address">Colombo 2</div>
                        <div class="ratings">⭐⭐⭐⭐⭐</div>
                        <button id="more-info-button" onclick="window.location.href='/agency-page'">More Info</button>
                    </div>
                </div>


                <!-- Agency Card 2 -->
                <div class="agency-card">
                    <img src="images/greentree.jpeg" alt="Agency 2">
                    <div class="details">
                        <div class="name">Green Tree</div>
                        <div class="address">Colombo 4</div>
                        <div class="ratings">⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 3 -->
                <div class="agency-card">
                    <img src="images/wardiere.jpeg" alt="Agency 3">
                    <div class="details">
                        <div class="name">Wardiere</div>
                        <div class="address">Laxshman Place</div>
                        <div class="ratings">⭐⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 4 -->
                <div class="agency-card">
                    <img src="images/speak.jpeg" alt="Agency 4">
                    <div class="details">
                        <div class="name">Speak</div>
                        <div class="address">Kandy</div>
                        <div class="ratings">⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 5 -->
                <div class="agency-card">
                    <img src="images/thynktalk.jpeg" alt="Agency 5">
                    <div class="details">
                        <div class="name">ThynkTalk</div>
                        <div class="address">Wadduwa</div>
                        <div class="ratings">⭐⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 6 -->
                <div class="agency-card">
                    <img src="images/wellness.jpeg" alt="Agency 6">
                    <div class="details">
                        <div class="name">Mind Wellness</div>
                        <div class="address">Wattala</div>
                        <div class="ratings">⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 7 -->
                <div class="agency-card">
                    <img src="images/asana.jpeg" alt="Agency 7">
                    <div class="details">
                        <div class="name">Asana</div>
                        <div class="address">Nuwara Eliya</div>
                        <div class="ratings">⭐⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
                <!-- Agency Card 8 -->
                <div class="agency-card">
                    <img src="images/warner.jpeg" alt="Agency 8">
                    <div class="details">
                        <div class="name">Warner & Spencer</div>
                        <div class="address">Angoda</div>
                        <div class="ratings">⭐⭐⭐⭐</div>
                        <button>More Info</button>
                    </div>
                </div>
            </div>

            <div class="reminders-section">
                <h2>Beautiful Reminders</h2>
                <div class="reminder-images">
                    <img src="images/post1.jpeg" alt="Reminder 1">
                    <img src="images/post2.jpeg" alt="Reminder 2">
                    <img src="images/post3.jpeg" alt="Reminder 3">
                </div>
            </div>

        </div>

        <div class="news-section">
            <img src="images/headpic.jpeg" alt="Mental Health">
            <div class="news-card">
                <h2>Mental Health News Section</h2>
                <p>Stay updated with the latest news and articles on mental health. Learn how to take care of your
                    mental well-being and find resources to help you cope with challenges.</p>
            </div>

        </div>

        <section class="articles-section">
            <h2>Latest News Articles</h2>
            <div class="articles">
                <div class="article">
                    <a href="https://www.healthline.com/health/depression/recognizing-symptoms"
                        target="_blank">Understanding Anxiety Disorders</a>
                    <p>An overview of anxiety disorders, including symptoms, causes, and treatments.</p>
                </div>
                <div class="article">
                    <a href="https://www.helpguide.org/articles/mental-health/building-better-mental-health.htm"
                        target="_blank">Coping with Depression: Tips and Strategies</a>
                    <p>Effective ways to manage and overcome depression.</p>
                </div>
                <div class="article">
                    <a href="https://www.thinkmentalhealthwa.com.au/supporting-my-mental-health/tips-and-tools/"
                        target="_blank">The Importance of Mental Health in Children</a>
                    <p>How to support and nurture mental health in children.</p>
                </div>
                <div class="article">
                    <a href="https://www.healthhub.sg/live-healthy/10-essentials-for-mental-well-being"
                        target="_blank">Mindfulness and Meditation: Benefits for Mental Health</a>
                    <p>The positive impact of mindfulness and meditation on mental well-being.</p>
                </div>
            </div>
        </section>

    </div>

    <footer>
        <p>&copy; 2024 Care Assist. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script>
        const links = document.querySelectorAll('.navbar a');
        const button = document.querySelector('.section button');

        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                links.forEach(link => link.style.color = 'white');
                link.style.color = '#ffcc00';

                link.classList.add('bubble');
                setTimeout(() => link.classList.remove('bubble'), 500);
            });
        });

        button.addEventListener('click', () => {
            button.classList.add('bubble');
            setTimeout(() => button.classList.remove('bubble'), 500);
        });

        document.styleSheets[0].insertRule(`.bubble {
            position: relative;
            animation: bubble 0.5s;
        }`, document.styleSheets[0].cssRules.length);

        document.styleSheets[0].insertRule(`@keyframes bubble {
            0% {transform: scale(1);}
            50% {transform: scale(1.3);}
            100% {transform: scale(1);}
        }`, document.styleSheets[0].cssRules.length);

        document.querySelectorAll('.article-card').forEach(card => {
            card.addEventListener('click', () => {
                // Replace '#' with the actual URL of the article
                window.location.href = '#';
            });
        });

        function toggleNav() {
            var menu = document.getElementById('side-menu');
            menu.classList.toggle('active');
        }
    </script>

</body>

</html>
