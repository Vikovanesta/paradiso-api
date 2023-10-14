<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_type_id',
        'name',
        'icon',
    ];    

    public function productSubCategory()
    {
        return $this->hasMany(ProductSubCategory::class);
    }
}
