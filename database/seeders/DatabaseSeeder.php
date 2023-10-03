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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $merchantLevels = ['standart', 'bronze', 'silver', 'gold', 'platinum'];
        foreach ($merchantLevels as $merchantLevel) {
            MerchantLevel::factory()->create([
                'name' => $merchantLevel,
            ]);
        }

        ProductCategory::factory(5)
            ->has(ProductSubCategory::factory()->count(2))
            ->create();

        User::factory(10)
            ->has(Merchant::factory()
                ->has(MerchantProfile::factory())
                ->has(Product::factory()->count(2)))
            ->create();

        // Product::factory(10)->create();

    }
}
