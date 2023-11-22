<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Global', 'Merchant', 'Product', 'Category', 'Subcategory',];

        foreach ($types as $type) {
            VoucherType::create([
                'name' => $type,
                'voucher_type_model' => 'App\\Models\\'.ucfirst($type),
            ]);
        }
    }
}
