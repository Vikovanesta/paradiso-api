<?php

namespace Database\Factories;

use App\Models\ItemStatus;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::query()->inRandomOrder()->first();
        $quantity = fake()->numberBetween(1, 10);

        return [
            'transaction_id' => Transaction::query()->inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'status_id' => ItemStatus::query()->inRandomOrder()->first()->id,
            'net_price' => $product->price * $quantity + fake()->numberBetween(-15000, 15000),
            'price' => $product->price * $quantity,
            'product_name' => $product->name,
            'product_description' => $product->description,
            'start_date' => fake()->dateTimeBetween('-3 year', 'now'),
            'end_date' => fake()->dateTimeBetween('-3 year', 'now'),
            'quantity' => $quantity,
            'note' => fake()->sentence(),
        ];
    }
}
