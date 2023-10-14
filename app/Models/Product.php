<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'duration',
        'start_date',
        'end_date',
        'price',
        'unit',
        'discount',
        'thumbnail',
        'address',
        'coordinate',
        'max_person',
        'min_person',
        'note',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function productStatus()
    {
        return $this->belongsTo(ProductStatus::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
