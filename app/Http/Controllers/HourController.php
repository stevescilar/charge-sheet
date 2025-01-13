<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Hour;
use Carbon\Carbon;
use App\Models\MonthClosure;

class HourController extends Controller
{
    // dashboard page 
    public function index()
    {
        $currentPeriod = MonthClosure::where('is_closed', false)->first();

        if ($currentPeriod) {
            $earnings = Hour::whereBetween('date', [$currentPeriod->start_date, $currentPeriod->end_date])->sum('earnings');
        }

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
        
    Hour::create($request->only(['date', 'start_time', 'end_time','earnings']));

    return redirect()->route('hours.index')->with('success', 'Hour added successfully');
    }

    public function setMonthPeriod(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check if an overlapping period exists
        $overlap = MonthClosure::where(function ($query) use ($validated) {
            $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']]);
        })->exists();

        if ($overlap) {
            return redirect()->back()->withErrors('The period overlaps with an existing month.');
        }

        MonthClosure::create($validated);

        return redirect()->route('hours.index')->with('success', 'Custom month period set successfully!');
    }

    public function closeMonth()
    {
        $currentPeriod = MonthClosure::where('is_closed', false)->first();

        if (!$currentPeriod) {
            return redirect()->back()->withErrors('No active month period to close.');
        }

        Hour::whereBetween('date', [$currentPeriod->start_date, $currentPeriod->end_date])
            ->update(['month_closure_date' => now(), 'is_closed' => true]);

        $currentPeriod->update(['is_closed' => true]);

        return redirect()->route('hours.index')->with('success', 'Month closed successfully!');
    }

    
}
