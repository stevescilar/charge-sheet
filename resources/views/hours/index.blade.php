<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contract Tracker</title>
</head>
<body>
    <h1>Contract Tracker</h1>
    <a href="{{ route('hours.create')}}">Add New Entry</a>
    <h2>Total Earning</h2>
    <br>
    {{-- <ul>
        @foreach($dailyEarnings as $day => $earnings)
        <li>{{ $day }} : Ksh. {{ $earnings }} </li>
        @endforeach
    </ul> --}}
    
    <h2>Monthly Earnings: </h2>
    <ul>
        @foreach($monthlyEarnings as $month => $earnings)
            <li>{{ $month }}: Ksh. {{ $earnings }}</li>
        @endforeach

    </ul>
    <table>
        <thead>
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
</body>
</html>