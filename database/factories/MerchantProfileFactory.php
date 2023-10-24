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
            'address' => fake()->address(),
            'description' => fake()->text(),
            'logo' => 'https://picsum.photos/100/100',
            'banner' => 'https://picsum.photos/500/250',
        ];
    }
}
