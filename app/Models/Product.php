<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_id',
        'product_sub_category_id',
        'city_id',
        'product_status_id',
        'user_id', // for admin
        'name',
        'description',
        'duration',
        'start_date',
        'end_date',
        'price',
        'unit',
        'discount',
        'thumbnail',
        'address',
        'coordinate',
        'max_person',
        'min_person',
        'note',
    ];

    public function scopeFilterByQuery($q, array $filters) 
    {
        return $q->when(isset($filters['category_id']), function ($q) use ($filters) {
            $q->whereRelation('productSubCategory', 'product_category_id', $filters['category_id']);
        })
        ->when(isset($filters['sub_category_id']), function ($q) use ($filters) {
            $q->where('product_sub_category_id', $filters['sub_category_id']);
        })
        ->when(isset($filters['name']), function ($q) use ($filters) {
            $q->where('name', 'like', '%' . $filters['name'] . '%');
        })
        ->when(isset($filters['duration']), function ($q) use ($filters) {
            $q->where('duration', $filters['duration']);
        })
        ->when(isset($filters['start_date']), function ($q) use ($filters) {
            $q->where('start_date', '>=', $filters['start_date']);
        })
        ->when(isset($filters['end_date']), function ($q) use ($filters) {
            $q->where('end_date', '<=', $filters['end_date']);
        })
        ->when(isset($filters['price_min']), function ($q) use ($filters) {
            $q->where('price', '>=', $filters['price_min']);
        })
        ->when(isset($filters['price_max']), function ($q) use ($filters) {
            $q->where('price', '<=', $filters['price_max']);
        })
        ->when(isset($filters['person_min']), function ($q) use ($filters) {
            $q->where('min_person', '>=', $filters['person_min']);
        })
        ->when(isset($filters['person_max']), function ($q) use ($filters) {
            $q->where('max_person', '<=', $filters['person_max']);
        })
        ->when(isset($filters['status_id']), function ($q) use ($filters) {
            $q->where('product_status_id', $filters['status_id']);
        })
        ->orderBy($filters['sort_by'] ?? 'updated_at', $filters['sort_direction'] ?? 'DESC');
    }

    public function isOwnedBy(Merchant $merchant)
    {
        return $this->merchant_id === $merchant->id;
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function productStatus()
    {
        return $this->belongsTo(ProductStatus::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function includeExcludes()
    {
        return $this->hasMany(IncludeExclude::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function terms()
    {
        return $this->hasMany(Term::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function productViews()
    {
        return $this->hasMany(ProductView::class);
    }
}
