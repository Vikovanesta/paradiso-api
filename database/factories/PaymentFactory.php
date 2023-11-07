<?php

namespace Database\Factories;

use App\Models\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_status_id' => PaymentStatus::query()->inRandomOrder()->first()->id,
            'payment_order' => rand(1, 3),
            'amount' => rand(100000, 1000000),
            'payment_token' => fake()->numerify('#######'),
            'due_date' => now()->addDays(7),
            'response' => fake()->sentence(),
        ];
    }
}
