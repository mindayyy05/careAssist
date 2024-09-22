<!-- resources/views/client_details.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            background-color: #21568a;
            color: white;
            padding: 15px;
            text-align: center;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .client-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .accept-button,
        .decline-button,
        .view-todo-button {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .accept-button {
            background-color: #4CAF50;
        }

        .decline-button {
            background-color: #f44336;
        }

        .view-todo-button {
            background-color: #2196F3;
            padding: 10px 20px;
        }

        .accept-button:hover,
        .decline-button:hover,
        .view-todo-button:hover {
            opacity: 0.9;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .back-link:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Client Details</h1>

        <div class="client-info">
            <p><strong>Name:</strong> {{ $client->name }}</p>
            <p><strong>Age:</strong> {{ $client->age }}</p>
            <p><strong>Gender:</strong> {{ $client->gender }}</p>
            <p><strong>City:</strong> {{ $client->city }}</p>
            <p><strong>Street Number:</strong> {{ $client->street_number }}</p>
            <p><strong>House Number:</strong> {{ $client->house_number }}</p>
            <p><strong>Start Date:</strong> {{ $client->start_date }}</p>
            <p><strong>End Date:</strong> {{ $client->end_date }}</p>
            <p><strong>Specific Date:</strong> {{ $client->specific_date }}</p>
            <p><strong>Start Time:</strong> {{ $client->start_time }}</p>
            <p><strong>End Time:</strong> {{ $client->end_time }}</p>
            <p><strong>Allergies:</strong> {{ $client->allergies }}</p>
            <p><strong>Disabilities:</strong> {{ $client->disabilities }}</p>
            <p><strong>Extra Notes:</strong> {{ $client->extra_notes }}</p>
        </div>

        <div class="button-row">
            <div class="button-group">
                <form action="{{ route('client.accept', $client->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="accept-button">Accept</button>
                </form>
                <form action="{{ route('client.decline', $client->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="decline-button">Decline</button>
                </form>
            </div>
            <a href="{{ route('client.todo.list', $client->id) }}" class="view-todo-button">View To-Do List</a>
        </div>

        <a href="{{ route('caretaker_dashboard') }}" class="back-link">Back to Dashboard</a>
    </div>
</body>

</html>
