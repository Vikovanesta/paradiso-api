<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $casts=[
        'start_date'=>'datetime',
        'end_date'=>'datetime',
    ];

    protected $fillable=[
        'product_id',
        'transaction_id',
        'status_id',
        'net_price',
        'price',
        'product_name',
        'product_description',
        'start_date',
        'end_date',
        'quantity',
        'note',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function status()
    {
        return $this->belongsTo(ItemStatus::class);
    }
}
