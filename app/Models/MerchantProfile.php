<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_id',
        'description',
        'address',
        'banner',
        'ktp_number',
        'npwp_number',
        'siup_number',
        'ktp',
        'npwp',
        'siup',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
