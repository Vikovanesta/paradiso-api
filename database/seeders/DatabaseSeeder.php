<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\MerchantLevel;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ProductStatusSeeder::class,
            ProductCategorySeeder::class,
            CountrySeeder::class,
        ]);

        $merchantLevels = ['standart', 'bronze', 'silver', 'gold', 'platinum'];
        foreach ($merchantLevels as $merchantLevel) {
            MerchantLevel::factory()->create([
                'name' => $merchantLevel,
            ]);
        }

        User::factory(1)
            ->has(Merchant::factory()
                ->has(MerchantProfile::factory())
                ->has(Product::factory()->count(rand(1, 5))))
            ->create([
                'name' => 'test',
                'email' => 'test@mail.com',
                'password' => 'password',
            ]);

        User::factory(10)
            ->has(Merchant::factory()
                ->has(MerchantProfile::factory())
                ->has(Product::factory()->count(rand(0, 5))))
            ->create();

        // Product::factory(10)->create();

    }
}
