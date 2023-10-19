<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'color',
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }
}
