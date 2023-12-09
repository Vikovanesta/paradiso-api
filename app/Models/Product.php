<?php

namespace App\Models;

use App\Traits\CaseConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, CaseConversion;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'deleted_at' => 'datetime',
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
        'price_unit',
        'stock',
        'discount',
        'thumbnail',
        'address',
        'coordinate',
        'max_person',
        'min_person',
        'note',
    ];

    protected static function booted()
    {
        static::created(function ($product) {
            $product->fields()->attach($product->productSubCategory->fields, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }

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
        ->when(isset($filters['status_id']), function ($q) use ($filters) {
            $q->where('product_status_id', $filters['status_id']);
        })
        ->orderBy($filters['sort_by'] ?? 'updated_at', $filters['sort_direction'] ?? 'DESC');
    }

    public function isOwnedBy(Merchant $merchant)
    {
        return $this->merchant_id === $merchant->id;
    }

    public function getAllCategorySpecificFields()
    {
        $categorySpecificFields = [];

        foreach ($this->fields()->get() as $field) {
            $fieldName = $field->name;
            $pivotValueAttribute = "value_{$field->data_type}";
        
            $categorySpecificFields[$fieldName] = $field->pivot->$pivotValueAttribute;
        }
        return $categorySpecificFields;
    }

    public function setCategorySpecificFieldByName($name, $value)
    {
        $field = Field::where('name', $name)->first();
        if ($field) {
            $pivotValueAttribute = "value_{$field->data_type}";

            $updateData = [
                $pivotValueAttribute => $value,
            ];

            $this->fields()->updateExistingPivot($field->id, $updateData);
        }
    }

    public function setCategorySpecificFieldByArray(array $fields)
    {
        $subCategoryFields = $this->productSubCategory->fields;

        foreach ($subCategoryFields as $field) {
            $fieldName = $field->name;
            $pivotValueAttribute = "value_{$field->data_type}";
    
            $value = $fields[$fieldName] ?? $this->{$this->snakeToCamel($fieldName)};
            
            $updateData = [$pivotValueAttribute => $value];
    
            $this->fields()->updateExistingPivot($field->id, $updateData);
        }
    }

    public function getDurationAttribute()
    {
        return $this->getFieldAttribute('duration');
    }

    public function getDurationUnitAttribute()
    {
        return $this->getFieldAttribute('duration_unit');
    }

    public function getMaxPersonAttribute()
    {
        return $this->getFieldAttribute('max_person');
    }

    public function getMinPersonAttribute()
    {
        return $this->getFieldAttribute('min_person');
    }

    public function getMinQuantityAttribute()
    {
        return $this->getFieldAttribute('min_quantity');
    }

    public function getMaxQuantityAttribute()
    {
        return $this->getFieldAttribute('max_quantity');
    }

    public function getBaggageAttribute()
    {
        return $this->getFieldAttribute('baggage');
    }

    public function getFuelAttribute()
    {
        return $this->getFieldAttribute('fuel');
    }

    public function getTransmissionAttribute()
    {
        return $this->getFieldAttribute('transmission');
    }

    public function getColorAttribute()
    {
        return $this->getFieldAttribute('color');
    }

    public function getCapacityAttribute()
    {
        return $this->getFieldAttribute('capacity');
    }

    public function getYearOfProductionAttribute()
    {
        return $this->getFieldAttribute('year_of_production');
    }

    public function getIncludeDriverAttribute()
    {
        return $this->getFieldAttribute('include_driver');
    }

    public function getRoomAreaAttribute()
    {
        return $this->getFieldAttribute('room_area');
    }

    public function getRoomCountAttribute()
    {
        return $this->getFieldAttribute('room_count');
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

    public function fields()
    {
        $allPivotColumns = \Schema::getColumnListing('field_product');

        return $this->belongsToMany(Field::class)
            ->withPivot($allPivotColumns)
            ->withTimestamps();
    }

    private function getFieldAttribute($name)
    {
        $field = $this->fields()->where('name', $name)->first();

        if ($field) {
            $pivotValueAttribute = "value_{$field->data_type}";
            return $field->pivot->$pivotValueAttribute;
        }
    
        return null;
    }
}
