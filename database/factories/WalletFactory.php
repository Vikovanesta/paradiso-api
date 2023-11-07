<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WalletStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchant_id' => Merchant::query()->inRandomOrder()->first()->id,
            'transaction_id' => Transaction::query()->inRandomOrder()->first()->id,
            'wallet_status_id' => WalletStatus::query()->inRandomOrder()->first()->id,
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'nominal' => rand(100000, 1000000),
            'type' => fake()->boolean(),
            'image' => fake()->imageUrl(),
        ];
    }
}
