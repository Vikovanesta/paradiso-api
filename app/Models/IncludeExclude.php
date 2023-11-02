<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncludeExclude extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'description',
        'is_include',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
