<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchantProfile()
    {
        return $this->hasOne(MerchantProfile::class);
    }
    public function merchantLevel()
    {
        return $this->belongsTo(MerchantLevel::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
