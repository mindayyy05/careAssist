<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Assist</title>
    <style>
        /* Reset some default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Navigation bar styling */
        .navbar {
            background-color: #003366;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            color: #fff;
            font-size: 24px;
            text-decoration: none;
        }

        .navbar-links {
            list-style: none;
            display: flex;
        }

        .navbar-links li {
            margin-left: 20px;
        }

        .navbar-links a {
            color: #fff;
            text-decoration: none;
            position: relative;
        }

        .navbar-links a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #fff;
            transition: width .3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .navbar-links a:hover::after {
            width: 100%;
        }

        .contact-info {
            color: #fff;
            font-size: 14px;
        }

        /* Banner styling */
        .banner {
            position: relative;
            width: 100%;
            height: 600px;
            /* Set the height of your banner */
            overflow: hidden;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensure the image covers the entire banner area */
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            /* Image sits behind the overlay and content */
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust overlay opacity */
            z-index: 2;
            /* Overlay sits above the image */
        }

        .banner-content {
            position: relative;
            z-index: 3;
            /* Content sits above both the overlay and image */
            color: white;
            /* Ensure text is visible */
            text-align: center;
            padding: 20px;
            margin-top: 12%;
        }


        .banner h1 {
            font-size: 50px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .banner h1 span {
            display: inline-block;
            white-space: nowrap;
            animation: slideIn 4s ease-in-out infinite;
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            20% {
                transform: translateX(0);
                opacity: 1;
            }

            80% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .banner p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .banner button {
            margin-top: 110px;
            padding: 20px 30px;
            background-color: #003366;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .banner button:hover {
            background-color: #002244;
        }

        /* Services section styling */
        .services-section {
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
        }

        .services-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .services-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .service-box {
            width: 30%;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .service-icon {
            font-size: 50px;
            color: #003366;
            margin-bottom: 15px;
        }

        .service-box h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #003366;
        }

        .service-box p {
            font-size: 16px;
            color: #666;
        }

        @media (max-width: 768px) {
            .service-box {
                width: 80%;
                margin: 10px auto;
            }
        }

        /* Who We Are Section Styling */
        .who-we-are-section {
            background-color: #fff;
            padding: 50px 20px;
            text-align: left;
        }

        .who-we-are-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            gap: 30px;
        }

        .who-we-are-image {
            width: 50%;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .who-we-are-content {
            width: 45%;
        }

        .who-we-are-content h2 {
            font-size: 30px;
            margin-bottom: 20px;
            color: #333;
        }

        .who-we-are-content p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #555;
            line-height: 1.6;
        }

        .contact-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #003366;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .contact-button:hover {
            background-color: #0056b3;
        }

        /* How We Can Help You Section */
        .help-section {
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
        }

        .help-section h2 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #003366;
        }

        .help-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            /* Add spacing between sections */
        }

        .help-box {
            width: 23%;
            /* Width for equal columns */
            padding: 20px;
            text-align: left;
            background-color: transparent;
            /* Remove background */
            border: none;
            /* Remove border */
            box-shadow: none;
            /* Remove box shadow */
            transition: none;
            /* No hover effect */
        }

        .help-box h3 {
            background-color: transparent;
            /* Remove background color */
            font-size: 24px;
            /* Adjust font size */
            margin-bottom: 15px;
            color: #002244;
            text-align: left;
            /* Align heading to the left */
            padding: 0;
        }

        .help-box ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .help-box li {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
            display: block;
            /* Remove flex, make it simple block */
        }

        .help-box li i {
            color: #28a745;
            margin-right: 10px;
        }


        @media (max-width: 768px) {
            .help-box {
                width: 80%;
                margin: 10px auto;
            }
        }

        .feedback-section {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .feedback-heading {
            margin-bottom: 20px;
        }

        .feedback-container {
            position: relative;
            overflow: hidden;
            /* Hide the scrollbar */
            width: 90%;
            margin: auto;
            white-space: nowrap;
            /* Ensure horizontal layout */
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on touch devices */
        }

        .feedback-cards {
            display: inline-flex;
            /* Arrange cards in a horizontal row */
            transition: transform 0.5s ease;
        }

        .feedback-card {
            background-color: #333;
            border-radius: 10px;
            padding: 15px;
            margin: 0 10px;
            width: 340px;
            /* Fixed width for consistent card sizing */
            height: auto;
            /* Adjust height based on content */
            color: white;
            flex-shrink: 0;
            text-align: left;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            /* Stack content vertically */
            overflow: hidden;
            /* Prevent content overflow */
        }

        .feedback-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            word-wrap: break-word;
            /* Wrap text if it's too long */
        }

        .feedback-card .rating {
            margin: 10px 0;
            font-size: 20px;
        }

        .feedback-card p {
            font-size: 14px;
            margin-top: 0;
            overflow: hidden;
            /* Hide overflowing text */
            text-overflow: ellipsis;
            /* Show ellipsis if text overflows */
            white-space: normal;
            /* Allow text wrapping */
        }


        /* Contact Us Section Styles */
        .contact-us-section {
            position: relative;
            width: 100%;
            overflow: hidden;
            /* Hide any overflow if necessary */
        }

        .contact-us-image {
            width: 100%;
            /* Full width */
            height: auto;
            /* Maintain aspect ratio */
            object-fit: cover;
            /* Ensure the image covers the section */
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            /* Image behind the overlay */
        }

        .contact-us-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 130%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust overlay opacity */
            z-index: 2;
            /* Overlay sits above the image */
        }

        .contact-us-content {
            position: relative;
            z-index: 3;
            /* Content sits above both the overlay and image */
            color: white;
            /* Ensure text is visible */
            padding: 20px;
        }


        .contact-us-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: rgba(255, 255, 255, 0.8);
            /* Light background for form inputs */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-left: 70px;
            width: 500px;
            margin-top: 1%;
        }

        .contact-us-form p {
            margin: 0 0 15px 0;
            color: #333;
            /* Dark color for text to contrast with form background */
            text-align: center;
            font-size: 18px;
        }

        .contact-us-form h2 {
            margin: 0 0 15px 0;
            color: #333;
            /* Dark color for text to contrast with form background */
            font-size: 40px;
            text-align: center;
        }

        .contact-us-form input,
        .contact-us-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .contact-us-form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .contact-us-form button {
            padding: 10px;
            background-color: #315479;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-us-form button:hover {
            background-color: #0056b3;
        }

        /* News Section Styles */
        .news-section {
            padding: 40px;
            background-color: #f5f5f5;
            /* Light background color for the section */
            text-align: center;
        }

        .news-section h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }

        .news-cards {
            display: flex;
            justify-content: center;
            gap: 65px;
            flex-wrap: wrap;
            /* Makes cards wrap to the next line on smaller screens */
        }

        .news-card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .news-card:hover {
            transform: translateY(-5px);
            /* Slight lift effect on hover */
        }

        .news-card a {
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .news-image {
            overflow: hidden;
            height: 200px;
            /* Fixed height for image container */
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            /* Smooth zoom-in effect */
        }

        .news-card:hover .news-image img {
            transform: scale(1.1);
            /* Image zoom-in on hover */
        }

        .news-content {
            padding: 15px;
            text-align: left;
        }

        .news-content h3 {
            font-size: 20px;
            margin: 0 0 10px;
            color: #333;
        }

        .news-content p {
            font-size: 14px;
            color: #777;
        }


        /* Footer Styles */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
            font-size: 14px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 0 20px;
        }

        .footer-column {
            width: 100%;
            max-width: 250px;
            margin-bottom: 30px;
        }

        .footer-column h4 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #f1f1f1;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 10px;
        }

        .footer-column p,
        .footer-column ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: #fff;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a img {
            width: 30px;
            height: 30px;
            transition: transform 0.3s;
        }

        .social-icons a img:hover {
            transform: scale(1.2);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
        }

        .footer-bottom p {
            margin: 0;
            color: #bbb;
        }

        .footer-bottom p a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom p a:hover {
            color: #fff;
        }



        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 40px 0;
        }

        .card {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            width: 22%;
            margin: 10px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="#" class="navbar-logo">CareAssist</a>

        <ul class="navbar-links">
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

        <div class="contact-info">
            <span>📞 072 530 6972 | 📧 info@careassist.net</span>
        </div>
    </div>

    <!-- Banner -->
    <div class="banner">
        <img src="{{ asset('images/bannerimage.jpeg') }}" alt="Banner Image" class="banner-image">
        <!-- Image goes here -->
        <div class="banner-overlay"></div>
        <div class="banner-content">
            <h1>
                <span class="sliding-text">Trustworthy</span> Care Assist
            </h1>
            <p>Here at Care Assist, we believe in helping people. Our mission is to help you keep living independently
                so that you can keep living life the way you want to.</p>
            <button>Read More</button>
        </div>
    </div>


    <!-- Services Section -->
    <div class="services-section">
        <h2>We Make Independent Living Possible.</h2><br><br>
        <div class="services-container">
            <div class="service-box">
                <div class="service-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 14 14">
                        <path fill="none" stroke="#003366" stroke-linecap="round" stroke-linejoin="round"
                            d="M11.28 9.34a1.91 1.91 0 0 0 0-2.77a2.07 2.07 0 0 0-2.85 0L7 8L5.57 6.57a2.07 2.07 0 0 0-2.85 0a1.91 1.91 0 0 0 0 2.77L7 13.5zM7 4.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                    </svg></div>
                <h3>We Provide Care</h3>
                <p>Need some help with daily chores, light housekeeping, personal care, or getting out to visit friends
                    and family? We can help with that and so much more!</p>
            </div>
            <div class="service-box">
                <div class="service-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 256 256">
                        <path fill="#003366"
                            d="m254.3 107.91l-25.52-51.06a16 16 0 0 0-21.47-7.15l-24.87 12.43l-52.39-13.86a8.14 8.14 0 0 0-4.1 0L73.56 62.13L48.69 49.7a16 16 0 0 0-21.47 7.15L1.7 107.9a16 16 0 0 0 7.15 21.47l27 13.51l55.49 39.63a8.1 8.1 0 0 0 2.71 1.25l64 16a8 8 0 0 0 7.6-2.1l55.07-55.08l26.42-13.21a16 16 0 0 0 7.15-21.46Zm-54.89 33.37L165 113.72a8 8 0 0 0-10.68.61C136.51 132.27 116.66 130 104 122l43.24-42h31.81l27.21 54.41ZM41.53 64L62 74.22l-25.57 51.05L16 115.06Zm116 119.13l-58.11-14.52l-49.2-35.14l28-56L128 64.28l9.8 2.59l-45 43.68l-.08.09a16 16 0 0 0 2.72 24.81c20.56 13.13 45.37 11 64.91-5L188 152.66Zm62-57.87l-25.52-51L214.47 64L240 115.06Zm-87.75 92.67a8 8 0 0 1-7.75 6.06a8 8 0 0 1-1.95-.24l-41.67-10.42a7.9 7.9 0 0 1-2.71-1.25l-26.35-18.82a8 8 0 0 1 9.3-13l25.11 17.94L126 208.24a8 8 0 0 1 5.82 9.7Z" />
                    </svg></div>
                <h3>We Provide Comfort</h3>
                <p>We reassure families by aiding their loved ones so that they may continue to live safely in their own
                    familiar environment.</p>
            </div>
            <div class="service-box">
                <div class="service-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="#003366" stroke-linejoin="round" stroke-width="1.5">
                            <path stroke-linecap="round" d="M12 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                            <path
                                d="M22 17.28a2.28 2.28 0 0 1-.662 1.606c-.976.984-1.923 2.01-2.936 2.958a.597.597 0 0 1-.823-.017l-2.918-2.94a2.28 2.28 0 0 1 0-3.214a2.277 2.277 0 0 1 3.233 0l.106.107l.106-.107A2.277 2.277 0 0 1 22 17.28Z" />
                            <path stroke-linecap="round" d="M5 20v-1a7 7 0 0 1 10-6.326" />
                        </g>
                    </svg></div>
                <h3>We Provide Companionship</h3>
                <p>It’s more than a job — it’s in our nature. We genuinely care about our clients and their overall
                    well-being.</p>
            </div>
        </div>
    </div>

    <!-- Who Are We Section -->
    <div class="who-we-are-section">
        <div class="who-we-are-container">
            <img src="images/whoarewe.jpeg" alt="Care Assist Team" class="who-we-are-image">
            <div class="who-we-are-content">
                <h2>Who Are We? What Do We Do?</h2>
                <p>We are a regional leader of non-medical home care in Tennessee.</p>
                <p>We provide cost-effective options for individuals to remain living independently in their own home.
                </p>
                <p>To begin, we will complete a free in-home assessment to design a comprehensive plan of care to meet
                    the clients’ specific needs. All services are provided by Caregivers or Certified Nursing Assistants
                    that have been thoroughly screened, trained, insured, and bonded.</p>
                <p>We are licensed by the state of Tennessee as a Personal Support Services Agency and are headquartered
                    in Chattanooga.</p>
                <p>We are proud to be locally owned and operated — not franchised.</p>
                <p>Counties we serve: Hamilton, Bradley, Marion, Polk, Sequatchie, Bledsoe, Rhea, Meigs, and McMinn.</p>
                <p>If you are considering in-home assistance for yourself or a loved one or simply have a question about
                    our services, please contact us.</p>
                <a href="tel:4238754254" class="contact-button">Call: 072 530 6972</a>
            </div>
        </div>
    </div>

    <div class=" our-services-container">
        <div class="title">Our Services</div>
        <div class="cards">
            <div class="card">
                <a href="{{ url('/caretakers') }}" style="text-decoration: none;">
                    <img src="{{ asset('images/caretakers-service.jpeg.png.jpeg') }}" alt="Hiring Caretakers">
                    <div class="card-title" style="color: black;">Hiring Caretakers</div>
                </a>
            </div>

            <div class="card">
                <a href="{{ url('/babysitters') }}" style="text-decoration: none;">
                    <img src="{{ asset('images/babysitters-service.jpeg.png.jpeg') }}" alt="Hiring Babysitters">
                    <div class="card-title" style="color: black;">Hiring Babysitters</div>
                </a>
            </div>


            <div class="card">
                <a href = "{{ url('/mental-home') }}" style="text-decoration: none;">
                    <img src="{{ asset('images/therapist-service.jpeg.png.jpeg') }}"
                        alt="Booking Mental Health Therapists">
                    <div class="card-title" style="color: black;">Booking Psychiatrists</div>
            </div>

            <div class="card">
                <a href="{{ url('/purchase-choose') }}" style="text-decoration: none;">
                    <img src="{{ asset('images/purchase-service.jpeg.png.jpeg.png') }}" alt="Purchase Health Products">
                    <div class="card-title" style="color: black;">Purchase Health Products</div>
                </a>
            </div>
        </div>

        <!-- How We Can Help You Section -->
        <div class="help-section">
            <h2>How We Can Help You</h2>
            <div class="help-container">
                <div class="help-box" onclick="window.location.href='baby.html';">
                    <h3>Babysitters</h3><br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Hospital Sitting</li>
                        <li><i class="fas fa-check-circle"></i> Home Sitting</li>
                        <li><i class="fas fa-check-circle"></i> Meal Preparation</li>
                        <li><i class="fas fa-check-circle"></i> Social Outings</li>
                    </ul>
                </div>
                <div class="help-box" onclick="window.location.href='elderly-care.html';">
                    <h3>Caretakers</h3><br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Bathing Assistance</li>
                        <li><i class="fas fa-check-circle"></i> Dressing Assistance</li>
                        <li><i class="fas fa-check-circle"></i> Toileting Assistance</li>
                        <li><i class="fas fa-check-circle"></i> Stand-by for Safety</li>
                        <li><i class="fas fa-check-circle"></i> Medication Reminders</li>
                    </ul>
                </div>
                <div class="help-box" onclick="window.location.href='counseling.html';">
                    <h3>Psychiatrists</h3><br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Support Session</li>
                        <li><i class="fas fa-check-circle"></i> Emotional Support</li>
                        <li><i class="fas fa-check-circle"></i> Wellness Checks</li>
                        <li><i class="fas fa-check-circle"></i> Counselling Session</li>
                    </ul>
                </div>
                <div class="help-box" onclick="window.location.href='purchase.html';">
                    <h3>Suppliers</h3><br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Purchase Services</li>
                        <li><i class="fas fa-check-circle"></i> View Pricing</li>
                        <li><i class="fas fa-check-circle"></i> Special Offers</li>
                        <li><i class="fas fa-check-circle"></i> Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Feedback Section -->
        <section class="feedback-section"><br><br><br>
            <h2 class="feedback-heading">What Our Clients Have to Say</h2><br><br>
            <div class="feedback-container" id="feedback-container">
                <div class="feedback-cards" id="feedback-cards">
                    <!-- Feedback Card 1 -->
                    <div class="feedback-card">
                        <h3>Lubna</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"The babysitter we hired was excellent.<br> Very attentive and caring!"</p>
                    </div>
                    <!-- Feedback Card 2 -->
                    <div class="feedback-card">
                        <h3>Mindi</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"Great elderly caretaker. Helped my mother<br> with all her needs and more."</p>
                    </div>
                    <!-- Feedback Card 3 -->
                    <div class="feedback-card">
                        <h3>Ishra</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"Highly professional service. <br>The babysitter was a true gem!"</p>
                    </div>
                    <!-- Feedback Card 4 -->
                    <div class="feedback-card">
                        <h3>Thinara</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"Excellent care for my elderly father. <br>Highly recommend!"</p>
                    </div>
                    <!-- Feedback Card 5 -->
                    <div class="feedback-card">
                        <h3>Soorya</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"Fantastic babysitter, very reliable and friendly."</p>
                    </div>
                    <!-- Feedback Card 6 -->
                    <div class="feedback-card">
                        <h3>Janaan</h3>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <p>"Wonderful elderly care service. My mother is very happy with the care."</p>
                    </div>
                </div>
            </div><br><br><br>
        </section><br><br><br>


        <!-- News For You Section -->
        <section class="news-section">
            <h2>News For You</h2>
            <div class="news-cards">
                <!-- News Card 1 -->
                <div class="news-card">
                    <a href="https://example.com/news-article-1" target="_blank">
                        <div class="news-image">
                            <img src="images/news1.jpeg" alt="News Image 1">
                        </div>
                        <div class="news-content">
                            <h3>How to Choose the Right Babysitter</h3>
                            <p>August 28, 2024</p>
                        </div>
                    </a>
                </div>

                <!-- News Card 2 -->
                <div class="news-card">
                    <a href="https://example.com/news-article-2" target="_blank">
                        <div class="news-image">
                            <img src="images/news2.jpeg" alt="News Image 2">
                        </div>
                        <div class="news-content">
                            <h3>Top Tips for Counseling Teens</h3>
                            <p>September 1, 2024</p>
                        </div>
                    </a>
                </div>

                <!-- News Card 3 -->
                <div class="news-card">
                    <a href="https://example.com/news-article-3" target="_blank">
                        <div class="news-image">
                            <img src="images/news3.jpeg" alt="News Image 3">
                        </div>
                        <div class="news-content">
                            <h3>Benefits of Professional Babysitting</h3>
                            <p>September 5, 2024</p>
                        </div>
                    </a>
                </div>



            </div>
        </section><br><br><br>

        <!-- Contact Us Section -->
        <section class="contact-us-section">
            <img src="{{ asset('images/contact.jpeg') }}" alt="Contact Us Image" class="contact-us-image">
            <!-- Image goes here -->
            <div class="contact-us-overlay"></div>
            <div class="contact-us-content"><br>
                <form class="contact-us-form">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="tel" name="number" placeholder="Your Phone Number" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div><br><br><br>
        </section>



        <!-- Footer Section -->
        <footer class="footer">
            <div class="footer-container">
                <!-- Company Info -->
                <div class="footer-column">
                    <h4>About Us</h4>
                    <p>
                        We are a leading provider of babysitting and counseling services. Our mission is to provide
                        reliable,
                        professional, and caring services to families everywhere.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Appointments</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-column">
                    <h4>Contact Us</h4>
                    <ul>
                        <li>Angoda</li>
                        <li>Colombo 45, Angoda, Kiribathgoda</li>
                        <li>Email: careassist@gmail.com</li>
                        <li>Phone: 072 530 6972</li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom Section -->
            <div class="footer-bottom">
                <p>&copy; 2024 Company Name. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a
                        href="#">Terms of Service</a></p>
            </div>
        </footer>









        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
        <script>
            // JavaScript for sliding text effect in main heading
            const words = ["Trustworthy", "Affordable", "Nourishing", "Caring"];
            let currentIndex = 0;
            const slidingTextElement = document.querySelector('.sliding-text');

            setInterval(() => {
                currentIndex = (currentIndex + 1) % words.length;
                slidingTextElement.style.animation = 'none'; // Reset the animation
                slidingTextElement.offsetHeight; // Trigger reflow
                slidingTextElement.style.animation = null; // Restart the animation
                slidingTextElement.textContent = words[currentIndex];
            }, 4000);

            document.addEventListener('keydown', function(event) {
                const container = document.getElementById('feedback-container');
                const scrollAmount = 300; // Amount to scroll with each key press

                if (event.key === 'ArrowRight') {
                    container.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                } else if (event.key === 'ArrowLeft') {
                    container.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                }
            });
        </script>

</body>

</html>
