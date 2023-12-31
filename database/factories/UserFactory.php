<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'is_email_verified' => true,
            'email_verified_at' => now(),
            'password' => fake()->password(),
            'phone' => fake()->unique()->phoneNumber(),
            'user_level' => 3,
            'status' => 1,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_email_verified' => false,
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model's email address should be verified.
     */
    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_email_verified' => true,
            'email_verified_at' => now(),
        ]);
    }

    public function superadmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_level' => 0,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_level' => 1,
        ]);
    }

    public function customer(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_level' => 2,
        ]);
    }

    public function merchant(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_level' => 3,
        ]);
    }
}
