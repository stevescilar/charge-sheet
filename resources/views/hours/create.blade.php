<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Entry</title>
</head>
<body>
    <h1>Add New Entry</h1>
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
</body>
</html>