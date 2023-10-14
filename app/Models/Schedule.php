<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'date',
        'title'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scheduleDays()
    {
        return $this->hasMany(ScheduleDay::class);
    }
}
