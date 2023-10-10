<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productStatuses = [
            [
                'name' => 'Draft',
                'color' => 'gray',
                'icon' => 'fa fa-file',
            ],
            [
                'name' => 'Pending',
                'color' => 'yellow',
                'icon' => 'fa fa-clock',
            ],
            [
                'name' => 'Published',
                'color' => 'green',
                'icon' => 'fa fa-check',
            ],
            [
                'name' => 'Rejected',
                'color' => 'red',
                'icon' => 'fa fa-times',
            ],
        ];

        foreach ($productStatuses as $productStatus) {
            \App\Models\ProductStatus::create($productStatus);
        }
    }
}
