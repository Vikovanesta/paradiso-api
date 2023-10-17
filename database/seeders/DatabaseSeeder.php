<?php

namespace Database\Seeders;

use App\Models\MerchantLevel;
use App\Models\Transaction;
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
        $merchantLevels = ['standart', 'bronze', 'silver', 'gold', 'platinum'];
        foreach ($merchantLevels as $merchantLevel) {
            MerchantLevel::factory()->create([
                'name' => $merchantLevel,
            ]);
        }

        $this->call([
            TransactionStatusSeeder::class,
            ProductStatusSeeder::class,
            ProductCategorySeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
        ]);
    }
}
