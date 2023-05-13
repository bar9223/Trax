@extends('layouts.simple')

@section('content')
    <div class="container">
        <h1>{{ $car->make }} {{ $car->model }} Trips</h1>
        <p>Total miles: {{ $totalMiles }}</p>

        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Miles</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($car->trips as $trip)
                <tr>
                    <td>{{ $trip->date }}</td>
                    <td>{{ $trip->miles }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
