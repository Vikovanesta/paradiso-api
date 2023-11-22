<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\VoucherType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucher_type_id' => VoucherType::query()->inRandomOrder()->first()->id,
            'merchant_id' => Merchant::query()->inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'code' => $this->faker->word,
            'nominal' => $this->faker->randomNumber(),
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'min_transaction' => $this->faker->randomNumber(),
            'max_discount' => $this->faker->randomNumber(),
            'quota' => $this->faker->randomNumber(),
        ];
    }
}
