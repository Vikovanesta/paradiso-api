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
        $statuses = [
            'draft',
            'submitted for review',
            'review process',
            'accepted',
            'rejected',
        ];

        foreach ($statuses as $status) {
            \App\Models\ProductStatus::factory()->create([
                'name' => $status,
            ]);
        }
    }
}
