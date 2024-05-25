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
    

    <div class="card" style="width: 18rem;">
        <div class="card-header">
        Monthly Earnings
        </div>

        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    
                    <tr>
                        <th>Month</th> 
                        <th>Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyEarnings as $month => $earnings)
                    <tr>
                        <td>{{ $month }}</td>
                        <td>Ksh. {{ number_format($earnings, 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
    <h3 class="mb-3"> Daily Earnings</h3>
    <table class="table table-striped">
        <thead class="thead-dark">
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
                <td> Ksh. {{ number_format($hour->earnings, 0)}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

    
@endsection