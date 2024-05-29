<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Hour;
use Carbon\Carbon;

class HourController extends Controller
{
    // dashboard page 
    public function index()
    {
        $hours = Hour::all();
        // $dailyEarnings = round($hours->sum('earnings'),0);
        // group by day and round them 
        $dailyEarnings = $hours->groupBy(function($date){
            return Carbon::parse($date->date)->format('Y-m-d');
        })->map(function($day){
            return round($day->sum('earnings'),0);
        });
        
        $monthlyEarnings = $hours->groupBy(function($date){
                return Carbon::parse($date->date)->format('F Y');
        })->map(function($month){
            return round($month->sum('earnings'),0);
        });

        return view('hours.index', compact('hours','dailyEarnings','monthlyEarnings'));

    }

    // take in the dates(view/page)
    public function create(){
        return view('hours.create');
    }
    // store the hours with restrictions to future dates
    public function store(Request $request){
        $request->validate([
            'date' => ['required', 'date', 'unique:hours,date', function ($attribute, $value, $fail) {
                $date = Carbon::parse($value);
                $dayOfWeek = $date->dayOfWeek;
                if ($dayOfWeek == Carbon::SATURDAY || $dayOfWeek == Carbon::SUNDAY) {
                $fail('Data entry is not allowed on Saturdays and Sundays.');
                }
                if ($date->isFuture()) {
                $fail('Data entry for future dates is not allowed.');
                }
            }],
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        
    Hour::create([$request->all()]);

    return redirect()->route('hours.index')->with('success', 'Hour added successfully');
    }
}
