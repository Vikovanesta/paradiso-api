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

    public function scopeFilterByQuery($q, array $filters)
    {
        return $q->when(isset($filters['voucher_type_id']), function ($q) use ($filters) {
            $q->where('voucher_type_id', $filters['voucher_type_id']);
        })
        ->when(isset($filters['name']), function ($q) use ($filters) {
            $q->where('name', 'like', '%' . $filters['name'] . '%');
        })
        ->when(isset($filters['code']), function ($q) use ($filters) {
            $q->where('code', 'like', '%' . $filters['code'] . '%');
        })
        ->when(isset($filters['nominal']), function ($q) use ($filters) {
            $q->where('nominal', $filters['nominal']);
        })
        ->when(isset($filters['start_date']), function ($q) use ($filters) {
            $q->where('start_date', '>=', $filters['start_date']);
        })
        ->when(isset($filters['end_date']), function ($q) use ($filters) {
            $q->where('end_date', '<=', $filters['end_date']);
        })
        ->when(isset($filters['min_transaction']), function ($q) use ($filters) {
            $q->where('min_transaction', $filters['min_transaction']);
        })
        ->when(isset($filters['max_discount']), function ($q) use ($filters) {
            $q->where('max_discount', $filters['max_discount']);
        })
        ->when(isset($filters['quota']), function ($q) use ($filters) {
            $q->where('quota', $filters['quota']);
        })
        ->orderBy($filters['order_by'] ?? 'updated_at', $filters['order_direction'] ?? 'DESC');
    }

    public function isOwnedBy(Merchant $merchant)
    {
        return $this->merchant_id === $merchant->id;
    }

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
