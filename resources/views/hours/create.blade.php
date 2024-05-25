@extends('layouts.app')


@section('title', 'Contract Tracker')

@section('content')

    <h1 class="mb-4">Add New Entry</h1>
    <form method="POST" action="{{ route('hours.store')}}">
        @csrf
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        </br>
        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time" name="start_time" required>
        </br>
        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" required>
        <br>
        <button type="submit"> Submit</button>
    </form>

    <a href="{{ route('hours.index') }}">Back to Home</a>
