<!DOCTYPE html>
<html>

<head>
    <title>Add a Review</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .review-form {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .review-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .review-form label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .review-form input,
        .review-form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }

        .review-form input:focus,
        .review-form textarea:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        .review-form button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .review-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="review-form">
        <h2>Add Your Review</h2>
        <form action="/submit-review" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" required></textarea>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>

            <button type="submit">Submit Review</button>
        </form>
    </div>
</body>

</html>
