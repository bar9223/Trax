@extends('layouts.simple')

@section('content')
<div class="container">
    <h1>Create Car</h1>

    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        @method('POST')
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" value="{{ old('year') }}" required autofocus><br>
        @if ($errors->has('year'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('year') }}</strong>
            </span>
        @endif

        <label for="make">Make:</label><br>
        <input type="text" id="make" name="make" class="form-control{{ $errors->has('make') ? ' is-invalid' : '' }}" value="{{ old('make') }}" required autofocus><br>
        @if ($errors->has('make'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('make') }}</strong>
            </span>
        @endif

        <label for="model">Model:</label><br>
        <input type="text" id="model" name="model" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" value="{{ old('model') }}" required autofocus><br>
        @if ($errors->has('model'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('model') }}</strong>
            </span>
        @endif

        <input type="submit" class="btn btn-secondary mb-3" value="Create Car">
    </form>
</div>
@endsection
