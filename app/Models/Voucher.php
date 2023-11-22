<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $fillable = [
        'voucher_type_id',
        'merchant_id',
        'name',
        'code',
        'nominal',
        'start_date',
        'end_date',
        'min_transaction',
        'max_discount',
        'quota',
    ];

    public function voucherType()
    {
        return $this->belongsTo(VoucherType::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
