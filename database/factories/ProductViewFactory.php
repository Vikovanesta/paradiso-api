<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductView>
 */
class ProductViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'count' => rand(1, 100),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        ];
    }

    public function rangeYear(int $year): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => fake()->dateTimeBetween("-{$year} year", "now")->format('Y-m-d H:i:s'),
        ]);
    }

    public function rangeMonth(int $month): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => fake()->dateTimeBetween("-{$month} month", "now")->format('Y-m-d H:i:s'),
        ]);
    }

    public function rangeWeek(int $week): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => fake()->dateTimeBetween("-{$week} week", "now")->format('Y-m-d H:i:s'),
        ]);
    }

    public function rangeDay(int $day): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => fake()->dateTimeBetween("-{$day} day", "now")->format('Y-m-d H:i:s'),
        ]);
    }
}
