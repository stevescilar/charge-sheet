@extends('layouts.app')


@section('title', 'Add New Entry')

@section('content')

    <h1 class="mb-4">Add New Entry</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>          
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="col-3">
    <form method="POST" action="{{ route('hours.store')}}">
        @csrf
        <div class="mb-3">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
       <div class="mb-3">
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" class="form-control" required>
       </div>
        <div class="mb-3">
            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" class="form-control" required>
        </div>
        
        <button class="btn btn-primary" type="submit"> Submit</button>
    </form>
   

    <a href="{{ route('hours.index') }}">Home</a>

     </div>
@endsection