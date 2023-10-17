<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\ProductStatus;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_sub_category_id' => ProductSubCategory::query()->inRandomOrder()->first()->id,
            'city_id' => City::query()->inRandomOrder()->first()->id,
            'product_status_id' => ProductStatus::query()->inRandomOrder()->first()->id,
            'name' => fake()->words(2, true),
            'description' => fake()->text(),
            'duration' => fake()->randomNumber(2),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'price' => fake()->randomNumber(6),
            'unit' => fake()->randomElement(['day', 'hour']), //not sure if this is correct
            'discount' => fake()->randomNumber(2),
            'thumbnail' => fake()->imageUrl(),
            'address' => fake()->address(),
            'coordinate' => fake()->latitude() . ',' . fake()->longitude(),
            'max_person' => fake()->randomNumber(2),
            'min_person' => fake()->randomNumber(2),
            'note' => fake()->text(),
            'is_published' => fake()->boolean(),
        ];
    }
}
