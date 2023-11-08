<?php

namespace Database\Seeders;

use App\Models\ItemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemStatus::create([
            'name' => '0',
            'description' => 'Waiting for merchant confirmation',
        ]);

        ItemStatus::create([
            'name' => '1',
            'description' => 'Confirmed by merchant',
        ]);

        ItemStatus::create([
            'name' => '2',
            'description' => 'Rejected by merchant',
        ]);
    }
}
