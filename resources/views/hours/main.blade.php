@extends('layouts.app')

@section('title', 'Contract Tracker')

@section('content')
    <h1 class="mb-4">Contract Tracker</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Add New Entry</h2>
            <form action="{{ route('hours.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Entry</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Daily Earnings:</h2>
            <ul class="list-group mb-4">
                @foreach($dailyEarnings as $day => $earnings)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $day }}
                        <span>${{ number_format($earnings, 2) }}</span>
                    </li>
                @endforeach
            </ul>

            <h2>Monthly Earnings:</h2>
            <ul class="list-group mb-4">
                @foreach($monthlyEarnings as $month => $earnings)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $month }}
                        <span>${{ number_format($earnings, 2) }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <h2>Entries</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Hours</th>
                <th>Earnings</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hours as $hour)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($hour->date)->format('l') }}</td>
                    <td>{{ $hour->date }}</td>
                    <td>{{ $hour->start_time }}</td>
                    <td>{{ $hour->end_time }}</td>
                    <td>{{ number_format($hour->hours, 2) }}</td>
                    <td>${{ number_format($hour->earnings, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('date');
            const today = new Date().toISOString().split('T')[0];
            
            // Disable future dates
            dateInput.setAttribute('max', today);
            
            dateInput.addEventListener('input', function () {
                const selectedDate = new Date(this.value);
                const dayOfWeek = selectedDate.getUTCDay();

                // Check if selected date is a weekend
                if (dayOfWeek === 6 || dayOfWeek === 0) { // 6 = Saturday, 0 = Sunday
                    alert('Data entry is not allowed on Saturdays and Sundays.');
                    this.value = '';
                }
            });

            // Disable past dates before the start of the project
            const startOfProject = '2024-01-01'; // Change to your project start date
            dateInput.setAttribute('min', startOfProject);
        });
    </script>
@endsection
