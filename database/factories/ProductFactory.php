<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Field;
use App\Models\Product;
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
        $productSubCategory = ProductSubCategory::query()->inRandomOrder()->first();
        
        // $this->setCategorySpecificFields($productSubCategory);

        return [
            'product_sub_category_id' => $productSubCategory->id,
            'city_id' => City::query()->inRandomOrder()->first()->id,
            'product_status_id' => ProductStatus::query()->inRandomOrder()->first()->id,
            'name' => fake()->words(2, true),
            'description' => fake()->text(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'price' => fake()->randomNumber(6),
            'price_unit' => fake()->randomElement(['day', 'hour', 'pack', 'night', 'piece']), //not sure if this is correct
            'stock' => fake()->randomNumber(2),
            'discount' => fake()->randomNumber(2),
            'thumbnail' => 'https://picsum.photos/200/200',
            'address' => fake()->address(),
            'coordinate' => fake()->latitude() . ',' . fake()->longitude(),
            'note' => fake()->text(),
            'is_published' => fake()->boolean(),
        ];
    }

    public function published(): ProductFactory
    {
        return $this->state([
            'is_published' => true,
        ]);
    }

    public function unpublished(): ProductFactory
    {
        return $this->state([
            'is_published' => false,
        ]);
    }

    public function paketWisata(): ProductFactory
    {
        $fields = [
            'duration' => rand(1, 5),
            'duration_unit' => 'day',
            'max_person' => rand(6, 10),
            'min_person' => rand(1, 5),
        ];
        
        return $this->state([
            'product_sub_category_id' => ProductSubCategory::query()->where('name', 'Paket Wisata')->first()->id,
            'price_unit' => 'pack',
        ])->afterCreating(function (Product $product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });

    }

    public function tiketMasuk(): ProductFactory
    {
        $fields = [
            'min_quantity' => rand(1, 5),
            'max_quantity' => rand(6, 10),
        ];

        $this->afterCreating(function ($product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });

        return $this->state([
            'product_sub_category_id' => ProductSubCategory::query()->where('name', 'Tiket Masuk')->first()->id,
            'price_unit' => 'person',
        ])->afterCreating(function (Product $product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });

    }

    public function rental(): ProductFactory
    {
        $fields = [
            'capacity' => rand(1, 5),
            'baggage' => rand(1, 5),
            'fuel' => fake()->randomElement(['solar', 'pertamax', 'pertalite']),
            'transmission' => fake()->randomElement(['manual', 'automatic']),
            'color' => fake()->colorName(),
            'year_of_production' => rand(1990, 2021),
            'include_driver' => rand(0,1),
        ];

        return $this->state([
            'product_sub_category_id' => ProductSubCategory::query()->where('name', 'Rental')->first()->id,
            'price_unit' => 'day',
        ])->afterCreating(function (Product $product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });
    }

    public function guide(): ProductFactory
    {
        $fields = [
            'duration' => rand(1, 5),
            'duration_unit' => 'day',
        ];

        return $this->state([
            'product_sub_category_id' => ProductSubCategory::query()->where('name', 'Guide')->first()->id,
            'price_unit' => 'day',
        ])->afterCreating(function (Product $product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });
    }

    public function kamarPenginapan(): ProductFactory
    {
        $fields = [
            'room_area' => rand(3, 5),
            'capacity' => rand(1, 4),
            'room_count' => rand(3, 10),
        ];

        return $this->state([
            'product_sub_category_id' => ProductSubCategory::query()->where('name', 'Kamar Penginapan')->first()->id,
            'price_unit' => 'night',
        ])->afterCreating(function (Product $product) use ($fields) {
            foreach ($fields as $key => $value) {
                $product->setCategorySpecificFieldByName($key, $value);
            }
        });
    }
}
