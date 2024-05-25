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
    <h2>Daily Earnings: ${{ $dailyEarnings }} </h2>
    <h2>Monthly Earnings: </h2>
    <ul>
        @foreach($monthlyEarnings as $month => $earnings)
            <li>{{ $month }}: ${{ $earnings }}</li>
        @endforeach

    </ul>
    <table>
        <thead>
            <tr>
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
                <td>{{ $hour->date}}</td>
                <td>{{ $hour->start_time}}</td>
                <td>{{ $hour->end_time}}</td>
                <td>{{ $hour->hours}}</td>
                <td>{{ $hour->earnings}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>