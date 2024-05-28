@extends('layouts.app')

@section('title', 'Add New Entry')

@section('content')

    <div class="justify-center col-8">
        <div class="card">
            <div class="card-header">
                Add New Entry
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('hours.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="time" id="start_time" name="start_time" class="form-control"
                            value="{{ old('start_time') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="time" id="end_time" name="end_time" class="form-control"
                            value="{{ old('end_time') }}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Entry</button>
                        <a href="{{ route('hours.index') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const today = new Date().toISOString().split('T')[0];

            // Disable future dates and weekends
            dateInput.setAttribute('max', today);
            dateInput.addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const dayOfWeek = selectedDate.getUTCDay();

                // Check if selected date is a weekend
                if (dayOfWeek === 6 || dayOfWeek === 0) { // 6 = Saturday, 0 = Sunday
                    alert('Data entry is not allowed on Saturdays and Sundays.');
                    this.value = '';
                } else if (this.value > today) {
                    alert('Data entry for future dates is not allowed.');
                    this.value = '';
                }
            });
            // Disable past dates before the start of the project
            const startOfProject = '2024-05-20';
            dateInput.setAttribute('min', startOfProject);
        });
    </script>
@endsection
