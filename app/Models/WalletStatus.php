<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletStatus extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'description',
    ];

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}
