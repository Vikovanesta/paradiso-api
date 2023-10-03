<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MerchantProfile>
 */
class MerchantProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'merchant_id' => Merchant::factory(),
            'address' => fake()->address(),
            'description' => fake()->text(),
            'logo' => fake()->imageUrl(),
            'banner' => fake()->imageUrl(),
        ];
    }
}
