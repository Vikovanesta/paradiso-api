<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categorySpecificRules = $this->getCategorySpecificRules();

        $rules = [
            'product_sub_category_id' => 'exists:product_sub_categories,id',
            'city_id' => 'exists:cities,id',
            'product_status_id' => 'exists:product_statuses,id|in:1,2',
            'name' => 'string',
            'description' => 'string',
            'start_date' => 'date_format:Y-m-d',
            'end_date' => 'date_format:Y-m-d|after_or_equal:start_date',
            'price' => 'integer|min:0',
            'price_unit' => 'string',
            'discount' => 'nullable|integer',
            'thumbnail' => 'file|mimes:jpeg,jpg,png,webp,bmp',
            'address' => 'string',
            'coordinate' => 'string',
            'note' => 'string',
            'includes' => 'array',
            'includes.*' => 'string|distinct',
            'excludes' => 'array',
            'excludes.*' => 'string|distinct',
            'facilities' => 'array',
            'facilities.*' => 'integer|exists:facilities,id',
            'terms' => 'array',
            'terms.*' => 'string|distinct',
            'faqs' => 'json',
            'schedules' => 'json',
            'images' => 'array',
            'images.*' => 'file|mimes:jpeg,jpg,png,webp,bmp',
            'saved_images' => 'array',
            'saved_images.*' => 'integer|exists:product_images,id',
        ];

        return array_merge($rules, $categorySpecificRules);
    }

    public function bodyParameters()
    {
        return [
            'product_sub_category_id' => [
                'description' => 'Product sub category id',
                'example' => 1,
            ],
            'city_id' => [
                'description' => 'City id',
                'example' => 1,
            ],
            'product_status_id' => [
                'description' => 'Product status id',
                'example' => 1,
            ],
            'name' => [
                'description' => 'Product name',
                'example' => 'Product name',
            ],
            'description' => [
                'description' => 'Product description',
                'example' => 'Product description',
            ],
            'start_date' => [
                'description' => 'Product start date',
                'example' => '2023-10-14',
            ],
            'end_date' => [
                'description' => 'Product end date',
                'example' => '2023-10-17',
            ],
            'price' => [
                'description' => 'Product price',
                'example' => 100000,
            ],
            'price_unit' => [
                'description' => 'Price per ...',
                'example' => 'per pack',
            ],
            'discount' => [
                'description' => 'Product discount',
                'example' => 0,
            ],
            'thumbnail' => [
                'description' => 'Product thumbnail',
            ],
            'address' => [
                'description' => 'Product address',
                'example' => 'Jl. Test',
            ],
            'coordinate' => [
                'description' => 'Product coordinate',
                'example' => '-6.8890653,109.1689806',
            ],
            'note' => [
                'description' => 'Product note',
                'example' => 'Product note',
            ],
            'includes.*' => [
                'description' => 'Service that included in product',
                'example' => 'include1',
            ],
            'excludes.*' => [
                'description' => 'Service that excluded in product',
                'example' => 'exclude1',
            ],
            'facilities.*' => [
                'description' => 'Facilities that available in product',
                'example' => 1,
            ],
            'terms.*' => [
                'description' => 'Terms and conditions of product',
                'example' => 'term1',
            ],
            'faqs' => [
                'description' => 'Product faqs',
                'example' => '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]',
            ],
            'schedules' => [
                'description' => 'Product schedules',
                'example' => '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]',
            ],
            'images.*' => [
                'description' => 'Product images',
            ],
            'saved_images.*' => [
                'description' => 'Product saved images. If you want to delete image, just remove it from this array',
                'example' => '1',
            ],
            'duration' => [
                'description' => 'Product duration (subcategories: Paket Wisata, Guide)',
                'example' => 3,
            ],
            'duration_unit' => [
                'description' => 'Unit to measure product duration (subcategories: Paket Wisata, Guide)',
                'example' => 'day',
            ],
            'max_person' => [
                'description' => 'Product max person (subcategories: Paket Wisata)',
                'example' => 10,
            ],
            'min_person' => [
                'description' => 'Product min person (subcategories: Paket Wisata)',
                'example' => 1,
            ],
            'min_quantity' => [
                'description' => 'Product min quantity (subcategories: Tiket Masuk)',
                'example' => 1,
            ],
            'max_quantity' => [
                'description' => 'Product max quantity (subcategories: Tiket Masuk)',
                'example' => 10,
            ],
            'capacity' => [
                'description' => 'Product capacity (subcategories: Rental, Kamar Penginapan)',
                'example' => 4,
            ],
            'baggage' => [
                'description' => 'Product baggage (subcategories: Rental)',
                'example' => 1,
            ],
            'fuel' => [
                'description' => 'Product fuel (subcategories: Rental)',
                'example' => 'Premium',
            ],
            'transmission' => [
                'description' => 'Product transmission (subcategories: Rental)',
                'example' => 'manual',
            ],
            'color' => [
                'description' => 'Product color (subcategories: Rental)',
                'example' => 'White',
            ],
            'year_of_production' => [
                'description' => 'Product year of production (subcategories: Rental)',
                'example' => 2008,
            ],
            'include_driver' => [
                'description' => 'Product include driver (subcategories: Rental)',
                'example' => 1,
            ],
            'room_area' => [
                'description' => 'Product room area (subcategories: Kamar Penginapan)',
                'example' => 5,
            ],
            'room_count' => [
                'description' => 'Product room count (subcategories: Kamar Penginapan)',
                'example' => 10,
            ],
        ];
    }

    protected function getCategorySpecificRules(): array
    {
        $product = $this->route('product');
        $productSubCategory = $product->productSubCategory ?? ProductSubCategory::find($this->input('product_sub_category_id'));

        $categorySpecificRules = [];

        switch ($productSubCategory->name) {
            case 'Paket Wisata':
                $categorySpecificRules = [
                    'duration' => 'sometimes|integer',
                    'duration_unit' => 'sometimes|string|in:hour,day',
                    'max_person' => 'sometimes|integer|min:1',
                    'min_person' => 'sometimes|integer|min:1',
                ];
                break;
            case 'Tiket Masuk':
                $categorySpecificRules = [
                    'min_quantity' => 'sometimes|integer|min:1',
                    'max_quantity' => 'sometimes|integer|min:1',
                ];
                break;
            case 'Rental':
                $categorySpecificRules = [
                    'capacity' => 'sometimes|integer|min:1',
                    'baggage' => 'sometimes|integer|min:0',
                    'fuel' => 'sometimes|string',
                    'transmission' => 'sometimes|string|in:manual, automatics',
                    'color' => 'sometimes|string',
                    'year_of_production' => 'sometimes|integer|min:0',
                    'include_driver' => 'sometimes|integer|boolean',
                ];
                break;
            case 'Guide':
                $categorySpecificRules = [
                    'duration' => 'sometimes|integer|min:1',
                    'duration_unit' => 'sometimes|string|in:hour,day',
                ];
                break;
            case 'Kamar Penginapan':
                $categorySpecificRules = [
                    'capacity' => 'sometimes|integer|min:1',
                    'room_area' => 'sometimes|integer|min:1',
                    'room_count' => 'sometimes|integer|min:1',
                ];
                break;
            default:
                break;
                
        }

        return $categorySpecificRules;
    }
}
