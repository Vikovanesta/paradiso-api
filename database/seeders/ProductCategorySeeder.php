<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategories = [
            'Paket Wisata',
            'Tiket Masuk',
            'Rental',
            'Guide',
            'Kamar Penginapan',
        ];

        foreach ($productCategories as $name) {
            $productCategory = ProductCategory::factory()->create([
                'name' => $name,
            ]);

            ProductSubCategory::factory()->create([
                'product_category_id' => $productCategory->id,
                'name' => $name,
            ]);
        }
    }
}
