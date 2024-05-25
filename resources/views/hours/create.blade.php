@extends('layouts.app')

@section('title', 'Add New Entry')

@section('content')
    <h1 class="mb-4">Add New Entry</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-3">
        <form action="{{ route('hours.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" value="{{ old('start_time') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" value="{{ old('end_time') }}"
                    required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Entry</button>
                <a href="{{ route('hours.index') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </form>
    </div>
@endsection
