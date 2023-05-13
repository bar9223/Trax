@extends('layouts.simple')

@section('content')
<div class="container">
    <h1>Cars List</h1>

    <a href="{{ route('cars.create') }}" class="btn btn-primary">Add new Car</a>

    <table class="table">
        <thead>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Trips</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car->year }}</td>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td><a href="{{ route('cars.trips', $car->id) }}">View Trips</a></td>
                <td>
                    <form method="POST" action="{{ route('cars.destroy', $car->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
