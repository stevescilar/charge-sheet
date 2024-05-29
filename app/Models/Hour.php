<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = [
    'date', 'start_time', 'end_time'
    ];
    // get hours for the day
    public function getHoursAttribute()
    {
       $startTime = strtotime($this->start_time);
       $endTime = strtotime($this->end_time);
       $hours_worked = ($endTime - $startTime) / 3600; 
       
       return max($hours_worked - 1, 0);
    }

    // calculate earnings per hours worked
    public function getEarningsAttribute()
    {
        return $this->hours * 1000;
    }

    public function getTotalAmountAttribute()
    {
        return round($this->earnings * 1.16, 2);
    }
}
