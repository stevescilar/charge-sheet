@extends('layouts.app')


@section('title', 'Contract Tracker')

@section('content')
    <h1 class="mb-4"> Contract Tracker </h1>
    <a href="{{ route('hours.create')}}" class="btn btn-primary mb-3">Add New Entry</a>
    
    {{-- <ul>
        @foreach($dailyEarnings as $day => $earnings)
        <li>{{ $day }} : Ksh. {{ $earnings }} </li>
        @endforeach
    </ul> --}}
    
    <h2>Monthly Earnings: </h2>
    <ul class="list-group mb-4">
        @foreach($monthlyEarnings as $month => $earnings)
            <li list-group-item d-flex justify-content-between align-items-center>{{ $month }}: Ksh. {{ $earnings }}</li>
        @endforeach

    </ul>

    <h3 class="mb-3"> Daily Earnings</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Hours</th>
                <th scope="col">Earnings</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($hours  as $hour )
            <tr>
                <td>{{ \Carbon\Carbon::parse($hour->date)->format('l') }}</td>
                <td>{{ $hour->date}}</td>
                <td>{{ $hour->start_time}}</td>
                <td>{{ $hour->end_time}}</td>
                <td>{{ number_format($hour->hours,2)}}</td>
                <td>{{ number_format($hour->earnings, 0)}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection