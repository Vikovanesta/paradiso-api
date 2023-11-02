<?php

namespace App\Http\Requests;

use App\Models\Merchant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_sub_category_id' => 'required|exists:product_sub_categories,id',
            'city_id' => 'required|exists:cities,id',
            'product_status_id' => 'required|exists:product_statuses,id',
            'name' => 'required|string',
            'description' => 'string',
            'duration_type' => 'required_with:duration|string|in:time,date', // 'time' or 'date
            'duration' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'discount' => 'nullable|integer',
            'thumbnail' => 'required|file|image',
            'address' => 'required|string',
            'coordinate' => 'required|string',
            'max_person' => 'required|integer',
            'min_person' => 'required|integer',
            'note' => 'string',
            'includes' => 'json',
            'includes.*' => 'string|distinct',
            'excludes' => 'json',
            'excludes.*' => 'string|distinct',
            'facilities' => 'json',
            'facilities.*' => 'string|distinct',
            'terms' => 'json',
            'terms.*' => 'string|distinct',
            'faqs' => 'json',
            'schedules' => 'json',
            'images' => 'array',
            'images.*' => 'file|image',
        ];
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
            'duration_type' => [
                'description' => 'Product duration type',
                'example' => 'time',
            ],
            'duration' => [
                'description' => 'Product duration',
                'example' => 3,
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
            'unit' => [
                'description' => 'Product unit',
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
            'max_person' => [
                'description' => 'Product max person',
                'example' => 10,
            ],
            'min_person' => [
                'description' => 'Product min person',
                'example' => 1,
            ],
            'includes' => [
                'description' => 'Product includes',
                'example' => '["include1", "include2"]',
            ],
            'excludes' => [
                'description' => 'Product excludes',
                'example' => '["exclude1", "exclude2"]',
            ],
            'facilities' => [
                'description' => 'Product facilities id',
                'example' => '["1", "2"]',
            ],
            'terms' => [
                'description' => 'Product terms',
                'example' => '["term1", "term2"]',
            ],
            'faqs' => [
                'description' => 'Product faqs',
                'example' => '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]',
            ],
            'schedules' => [
                'description' => 'Product schedules',
                'example' => '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]',
            ],
        ];
    }
}
