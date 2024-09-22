<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            background-color: #f8f9fa;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #ff5a5f;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li {
            display: inline;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .nav-button a {
            text-decoration: none;
            color: #fff;
            background-color: #ff5a5f;
            padding: 10px 20px;
            border-radius: 5px;
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
            width: 800px;
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
            cursor: pointer;
            text-decoration: none;
            color: inherit;
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

        .service-card a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Care Assist</div>
            <ul class="nav-links">
                <li><a href="sellerdashboard.html">Home</a></li>
                <li><a href="listprod.html">Listing</a></li>
                <li><a href="order.html">Orders</a></li>
                <li><a href="#">My Account</a></li>
            </ul>
            <div class="nav-button">
                <a href="#">Call Us: 072 530 6972</a>
            </div>
        </nav>
        <div class="banner">
            <div class="banner-content">
                <h1>Hello Thinara!</h1>
                <p>You can now:</p>
                <div class="availability">
                    <span>Sell Products</span>
                    <span>Get Orders</span>
                </div>
            </div>
            <img src="images/sellerban.png" alt="Mother and Baby" class="banner-img">
        </div>
    </header>
    <main>
        <section class="services">
            <a href="listprod.html" class="service-card1">
                <h2>List a Product</h2>
            </a>
            <a href="/supplier-orders" class="service-card2">
                <h2>Check Orders</h2>
            </a>

            <a href="myacc.html" class="service-card3">
                <h2>My Account</h2>
            </a>
        </section>
    </main>
</body>

</html>
