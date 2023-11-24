<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'transaction_id' => Transaction::query()->inRandomOrder()->first()->id,
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'review' => fake()->paragraph(),
            'rating' => rand(1, 5),
        ];
    }
}
