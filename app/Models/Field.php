<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function productSubCategories()
    {
        return $this->belongsToMany(ProductSubCategory::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('value_string', 'value_integer')
            ->withTimestamps();
    }
}
