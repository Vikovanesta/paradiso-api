<?php

namespace Database\Factories;

use App\Models\MerchantLevel;
use App\Models\MerchantStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchant_level_id' => MerchantLevel::query()->inRandomOrder()->first()->id,
            'merchant_status_id' => MerchantStatus::query()->inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'logo' => 'https://picsum.photos/100/100',
            'is_highlight' => fake()->boolean(),
            'notes' => fake()->text(),
            // 'ktp' => fake()->numerify('################'),
            // 'npwp' => fake()->numerify('###############'),
        ];
    }
}
