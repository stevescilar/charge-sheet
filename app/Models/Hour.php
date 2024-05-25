<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'start_time','end_time'];

    // get hours for the day
    public function getHourAttribute()
    {
        return(strtotime($this->end_time) - strtotime($this->start_time)) / 3600;

    }

    // calculate earnings per hours worked
    public function getEarningAttribute()
    {
        return $this->hours * 1000;
    }
}
