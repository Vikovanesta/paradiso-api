<?php

namespace Database\Seeders;

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
        ProductCategory::factory(5)
            ->has(ProductSubCategory::factory()->count(2))
            ->create();
    }
}
