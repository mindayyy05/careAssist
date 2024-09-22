@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Add Your To-Do List Here<br>
            <h2>Make sure to write the time and the task</h2>
        </h1><br>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <input type="hidden" name="caretaker_id" value="{{ $caretakerId }}">

            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="form-group mb-3">
                            <label for="task_{{ $i }}">{{ $i }}.</label>
                            <input type="text" class="form-control" id="task_{{ $i }}"
                                name="task_{{ $i }}" placeholder="Enter task {{ $i }}">
                        </div>
                    @endfor
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    @for ($i = 11; $i <= 20; $i++)
                        <div class="form-group mb-3">
                            <label for="task_{{ $i }}">{{ $i }}.</label>
                            <input type="text" class="form-control" id="task_{{ $i }}"
                                name="task_{{ $i }}" placeholder="Enter task {{ $i }}">
                        </div>
                    @endfor
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
