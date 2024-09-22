<!-- resources/views/client_todo_list.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        p {
            margin: 0;
            padding: 8px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #21568a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background-color: #1b4f72;
        }

        .no-tasks {
            text-align: center;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>To-Do List for Client</h1>

        @if ($todos->isEmpty())
            <p class="no-tasks">No to-do list found for this client.</p>
        @else
            <ul>
                @foreach ($todos as $todo)
                    @foreach (range(1, 20) as $i)
                        @if (!empty($todo["task_$i"]))
                            <li>
                                <p><strong>Task {{ $i }}:</strong> {{ $todo["task_$i"] }}</p>
                            </li>
                        @endif
                    @endforeach
                @endforeach

            </ul>
        @endif

        <a href="{{ route('client.details', ['id' => $clientId]) }}">Back to Client Details</a>
    </div>
</body>


</html>
