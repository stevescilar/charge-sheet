<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthClosure extends Model
{
    protected $fillable = ['start_date', 'end_date', 'is_closed'];
}
