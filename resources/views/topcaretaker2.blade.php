<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Caretaker - Jane Smith
    </title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .left,
        .navbar .right {
            display: flex;
            align-items: center;
        }

        .navbar .logo {
            margin-right: 10px;
        }

        .navbar img {
            height: 60px;
            width: auto;
        }

        .content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .card {
            display: flex;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 0 auto;
        }

        .card img {
            max-width: 400px;
            border-radius: 8px;
            margin-right: 20px;
        }

        .card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 700px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            text-align: left;
        }

        .card-description {
            font-size: 16px;
            color: #666;
            text-align: left;
        }

        .card-description p {
            margin: 0 0 10px;
            text-align: left;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #555;
        }

        .button-row {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 20px;
        }

        .button-row a {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .call-button {
            background-color: #4CAF50;
            color: black;
        }

        .call-button:hover {
            background-color: #45a049;
        }

        .hire-button {
            background-color: #FFA500;
            color: black;
            padding: 10px 30px;
        }

        .hire-button:hover {
            background-color: #ff8c00;
        }

        .message-button {
            background-color: #ADD8E6;
            color: black;
        }

        .message-button:hover {
            background-color: #87ceeb;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="logo">
                <img src="{{ asset('images/careassist_logo copy.jpeg.png') }}" alt="Logo">
            </div>
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">My Dashboard</a>
            <a href="#">My Profile</a>
        </div>
        <div class="right">
            <a href="{{ route('logout') }}">Sign Out</a>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <img src="{{ asset('images/topcaretaker2.jpeg') }}" alt="Caretaker Photo">
            <div class="card-content">
                <div class="card-title">Jane Smith</div>
                <div class="card-description">
                    <h3>About Me</h3>
                    <p>
                        I am a serious and reasonable person. I work hard and do not cheat in my work because I fear the
                        Day of Resurrection. That's why I work honestly and don't cheat. When I work, I master my work,
                        so that I leave an imprint in the mind and heart of my employers, good about me, and they
                        remember me with goodness.
                    </p> <br>
                    <p>
                        Location: New York<br>
                        Rating: ★★★★☆<br>
                        Experience: 5 years
                    </p>
                </div>
            </div>
        </div><br><br>

        <div class="card">
            <div class="card-content">
                <div class="card-description">
                    <h3>Personal</h3>
                    <p>
                        33-year old female<br>
                        Moroccan<br>
                        Living in Morocco<br>
                        Has no passport<br>
                        Has no visa
                    </p>
                    <h3>Qualifications</h3>
                    <p>
                        4 Years of paid experience<br>
                        20 or more years of education<br>
                        Infant care qualified<br>
                        First-aid trained<br>
                        Swimmer<br>
                        No driver's license<br>
                        References available
                    </p>
                    <h3>Senior Caregiver Experience</h3>
                    <p>
                        I have 4 years paid experience with the following:<br>
                        Case Worker, Certified Nursing Assistant, Licensed RN, Nursing Intern, Nursing Student, Physical
                        Therapy, Physician's Assistant, Practicing RN, Senior Care Companion<br>
                        I am experienced working with these types of special needs:<br>
                        Alzheimer's, Arthritis, Dementia, Diabetes, Digestive Disorders, Epilepsy, Hearing Impairment,
                        Immobility, Obesity, Obsessive Compulsive Disorder, Parkinson's, Post Traumatic Stress Disorder,
                        Respiratory Issues, Sleep Disorder, Visual Impairment<br>
                        I have the following skills or certifications:<br>
                        Behavioral Issues, Bonded, CPR, First Aid, Insured, Licensed, NAPGGM Certified, NACCM
                        Certified<br>
                        I am comfortable working with 6 people
                    </p>
                    <h3>Senior Caregiver Requirements</h3>
                    <p>
                        I am available for the following types of visits:<br>
                        Drop-Ins, Day Visits, Extended Stays, Overnight Stays, Travel<br>
                        I provide the following Senior Caregiver services:<br>
                        Companion Services, Home Care Services, Hospice Services, Live in Home Care, Medical Care,
                        Rehabilitation Services, Physical Therapy, Respite Care, Visiting Nurse, Visiting Physician,
                        Transportation<br>
                        Additional Senior Caregiver tasks that I am able to perform:<br>
                        Administer Shots, Bathing, Change Adult Diapers, Light House Cleaning, Meal Preparation, Pay
                        Bills, Run Errands, Shopping, Administer Medication
                    </p>
                    <h3>Availability</h3>
                    <p>
                        SUN, MON, TUE, WED, THU, FRI, SAT<br>
                        Morning, Afternoon, Evening<br>
                        Available May 2024 - Apr 2025<br>
                        Seeking Full- or Part-time, Live In/Out<br>
                        Negotiable/wk<br>
                        I am available on short notice<br>
                        Last logged in 07 Jul 2024<br>
                        Member since 12 May 2024
                    </p>
                    <h3>Lifestyle</h3>
                    <p>
                        Excellent health, Non-smoker, None - I eat everything, Islamic, No tattoos, No piercings
                    </p>
                </div><br><br>

                <div class="button-row">
                    <a href="tel:+94703003116" class="call-button">Call Caretaker</a>
                    <a href="{{ route('show_hire_form') }}" class="hire-button">Hire Caretaker</a>

                    <a href="sms:+94703003116" class="message-button">Message</a>
                </div>
            </div>
        </div>

        <div class="button-container">
            <a href="#">Go to the top &raquo;</a>
        </div>
    </div>
</body>

</html>
