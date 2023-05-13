@extends('layouts.simple')

@section('content')
    <div class="container">
        <h1>Create Trip</h1>

        <form method="POST" action="{{ route('trips.store') }}">
            @csrf
            @method('POST')

            <label for="car_id">Car:</label><br>
            <select id="car_id" class="form-control" name="car_id" required autofocus>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }}</option>
                @endforeach
            </select>
            @if ($errors->has('car_id'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('car_id') }}</strong>
            </span>
            @endif
            <br>
            <label for="date">Date:</label><br>
            <input type="date" id="date" class="form-control" name="date" required autofocus><br>
            @if ($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
            @endif

            <label for="miles">Miles:</label><br>
            <input type="number" id="miles" class="form-control" name="miles" step="0.1" required autofocus><br>
            @if ($errors->has('miles'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('miles') }}</strong>
            </span>
            @endif

            <input type="submit" class="btn btn-secondary mb-3" value="Create Trip">
        </form>
    </div>
@endsection
