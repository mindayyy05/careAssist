@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Dashboard - Caretaker Requests</h1>

        @if ($caretakerRequests->isEmpty())
            <p>No caretaker requests found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Allergies</th>
                        <th>Disabilities</th>
                        <th>Bathing Times</th>
                        <th>Bathing Method</th>
                        <th>Breakfast Time</th>
                        <th>Lunch Time</th>
                        <th>Dinner Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caretakerRequests as $request)
                        <tr>
                            <td>{{ $request->patient_name }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->age }}</td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->location }}</td>
                            <td>{{ $request->date }}</td>
                            <td>{{ $request->start_time }}</td>
                            <td>{{ $request->end_time }}</td>
                            <td>{{ $request->allergies }}</td>
                            <td>{{ $request->disabilities }}</td>
                            <td>{{ $request->bathing_times }}</td>
                            <td>{{ $request->bathing_method }}</td>
                            <td>{{ $request->breakfast_time }}</td>
                            <td>{{ $request->lunch_time }}</td>
                            <td>{{ $request->dinner_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
