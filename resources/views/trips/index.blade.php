@extends('layouts.simple')

@section('content')
    <div class="container">
        <h1 class="mb-3">Trips List</h1>

        <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Add new Trip</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Date</th>
                <th>Miles</th>
                <th>Car</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->date }}</td>
                    <td>{{ $trip->miles }}</td>
                    <td>{{ $trip->car_make }} {{ $trip->car_model }}</td>
                    <td>
                        <form method="POST" action="{{ route('trips.destroy', $trip->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
