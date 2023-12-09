<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            TransactionStatusSeeder::class,
            PaymentStatusSeeder::class,
            ProductStatusSeeder::class,
            ItemStatusSeeder::class,
            MerchantStatusSeeder::class,
            WalletStatusSeeder::class,

            BankSeeder::class,
            CountrySeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            MerchantLevelSeeder::class,
            VoucherTypeSeeder::class,
            ProductCategorySeeder::class,
            FieldSeeder::class,
            FacilitySeeder::class,

            TestUserSeeder::class,
            UserSeeder::class,
            VoucherSeeder::class,
            ChatRoomSeeder::class,
        ]);
    }
}
