<?php

namespace Database\Seeders;

use App\Models\IncludeExclude;
use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\Product;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\User;
use Database\Factories\ScheduleDayFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->has(
            Merchant::factory()
            ->has(MerchantProfile::factory())
            ->has(
                Product::factory(2)
                ->has(
                    Schedule::factory(2)
                    ->has(ScheduleDayFactory::times(2))
                )
                ->has(Review::factory(2))
                ->has(IncludeExclude::factory(2))
            )
        )
        ->create([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => 'password',
        ]);

        User::factory(9)
        ->has(
            Merchant::factory()
            ->has(MerchantProfile::factory())
            ->has(
                Product::factory(2)
                ->has(
                    Schedule::factory(2)
                    ->has(ScheduleDayFactory::times(2))
                )
                ->has(Review::factory(2))
                ->has(IncludeExclude::factory(2))
            )
        )
        ->create();
    }
}
