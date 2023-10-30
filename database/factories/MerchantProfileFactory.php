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
            'description' => fake()->text(),
            'address' => fake()->address(),
            'banner' => 'https://picsum.photos/500/250',
            'ktp_number' => fake()->numerify('################'),
            'npwp_number' => fake()->numerify('###############'),
            'siup_number' => fake()->numerify('#############'),
            'ktp' => 'https://picsum.photos/500/250',
            'npwp' => 'https://picsum.photos/500/250',
            'siup' => 'https://picsum.photos/500/250',
        ];
    }
}
