<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'start_time',
        'end_time',
        'description',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
