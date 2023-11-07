<?php

namespace Database\Seeders;

use App\Models\MerchantLevel;
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
            PaymentStatusSeeder::class,
            ProductStatusSeeder::class,
            ItemStatusSeeder::class,
            MerchantStatusSeeder::class,

            BankSeeder::class,
            CountrySeeder::class,
            ProductCategorySeeder::class,
            FacilitySeeder::class,
            TestUserSeeder::class,
            UserSeeder::class,
        ]);
    }
}
