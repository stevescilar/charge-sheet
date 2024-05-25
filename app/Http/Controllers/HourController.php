<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Hour;

class HourController extends Controller
{
    // dashboard page 
    public function index()
    {
        $hours = Hour::all();
        $dailyEarnings = $hours->sum('earnings');
        $monthlyEarnings = $hours->groupBy(function($date){
            return \Carbon\Carbon::parse($date->date)->format('Y-m');
        })->map(function($month){
            return $month->sum('earnings');
        });

        return view('hours.index', compact('hours','dailyEarnings','monthlyEarnings'));

    }

    // take in the dates(view/page)
    public function create(){
        return view('hours.create');
    }
    // store the hours
    public function store(Request $request){
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

    Hour::create($request->all());
    return redirect()->route('hours.index')->with('success', 'Hour added successfully');
    }
}