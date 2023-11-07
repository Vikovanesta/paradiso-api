<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $casts =
    [
        'due_date' => 'datetime',
    ];

    protected $fillable =
    [
        'transaction_id',
        'payment_status_id',
        'payment_order',
        'amount',
        'payment_token',
        'due_date',
        'response',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }
}
