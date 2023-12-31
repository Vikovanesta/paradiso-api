<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'invoice_number',
        'user_id',
        'transaction_status_id',
        'item_total_price',
        'item_total_net_price',
        'voucher_price',
        'amount',
    ];

    public function isOwnedBy(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
