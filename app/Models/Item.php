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

    public function scopeFilterByQuery($q, array $filters)
    {
        return $q->when(isset($filters['status_id']), function ($q) use ($filters) {
            $q->where('status_id', $filters['status_id']);
        })
        ->when(isset($filters['quantity_min']), function ($q) use ($filters) {
            $q->where('quantity', '>=', $filters['quantity_min']);
        })
        ->when(isset($filters['quantity_max']), function ($q) use ($filters) {
            $q->where('quantity', '<=', $filters['quantity_max']);
        })
        ->when(isset($filters['start_date']), function ($q) use ($filters) {
            $q->where('start_date', '>=', $filters['start_date']);
        })
        ->when(isset($filters['end_date']), function ($q) use ($filters) {
            $q->where('end_date', '<=', $filters['end_date']);
        })
        ->orderBy($filters['order_by'] ?? 'updated_at', $filters['order_direction'] ?? 'DESC');
    }

    public function scopeFilterRelation($q, array $filters, string $key, string $relation, string $column)
    {
        return $q->when(array_key_exists($key, $filters), function ($q) use ($filters, $relation, $column, $key) {
            $q->whereRelation($relation, $column, $filters[$key]);
        });
    }

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

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
