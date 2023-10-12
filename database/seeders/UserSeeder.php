<?php

namespace Database\Seeders;

use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)
        ->has(Merchant::factory()
            ->has(MerchantProfile::factory())
            ->has(Product::factory()->count(rand(1, 5))))
        ->create([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => 'password',
        ]);

        User::factory(9)
        ->has(Merchant::factory()
            ->has(MerchantProfile::factory())
            ->has(Product::factory()
                ->has(Schedule::factory()->count(rand(1, 2)))
            ->count(rand(0, 4))))
        ->create();
    }
}
