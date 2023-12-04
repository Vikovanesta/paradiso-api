<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'transaction_id',
        'product_id',
        'review',
        'rating',
        'reply',
    ];

    public function filterByQuery($q, array $filters)
    {
        return $q->when(isset($filters['rating_min']), function ($q) use ($filters) {
            $q->where('rating', '>=', $filters['rating_min']);
        })
        ->when(isset($filters['rating_max']), function ($q) use ($filters) {
            $q->where('rating', '<=', $filters['rating_max']);
        })
        ->when(isset($filters['is_replied']), function ($q) {
            $q->whereNotNull('reply');
        })
        ->orderBy($filters['order_by'] ?? 'updated_at', $filters['order_direction'] ?? 'DESC');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
