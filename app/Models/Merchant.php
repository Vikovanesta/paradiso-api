<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_level_id',
        'merchant_status_id',
        'name',
        'ktp',
        'npwp',
        'siup',
    ];

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
    public function merchantStatus()
    {
        return $this->belongsTo(MerchantStatus::class);
    }
}
