<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Category</title>
    <!-- Include your CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Inline CSS for quick setup; move to CSS file for production */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            overflow: hidden;
            /* Hides overflow to prevent scrollbar */
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .title {
            font-size: 32px;
            /* Increased font size for better visibility */
            margin-bottom: 30px;
        }

        .categories {
            display: flex;
            justify-content: center;
            gap: 20px;
            /* Adjusted gap between cards */
        }

        .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 250px;
            height: 300px;
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .category-card:hover {
            transform: scale(1.05);
            /* Slightly enlarge the card on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            /* Add shadow effect on hover */
        }

        .category-card img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            /* Ensure the image covers the card */
        }

        .category-card .label {
            margin: 10px 0;
            font-size: 18px;
            /* Adjusted font size */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">- Choose Your Category -</h1>
        <div class="categories">
            <div class="category-card">
                <a href="{{ url('/babyproducts') }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('images/baby_product_nobg.png') }}" alt="Baby Products">
                    <div class="label">Baby Products</div>
                </a>
            </div>
            <div class="category-card">
                <a href="{{ url('/elderlyproducts') }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('images/elder_product.png') }}" alt="Elderly Products">
                    <div class="label">Elderly Products</div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
