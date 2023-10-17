<?php

namespace Database\Factories;

use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => fake()->unique()->randomNumber(9),
            'transaction_status_id' => TransactionStatus::query()->inRandomOrder()->first()->id,
            'item_total_price' => rand(50000, 1000000),
            'item_total_net_price' => rand(50000, 1000000),
            'voucher_price' => rand(50000, 1000000),
            'amount' => rand(1, 10),
        ];
    }
}
