<?php

namespace Database\Seeders;

use App\Models\MerchantStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchantStatuses = ['Submit for review', 'Review process', 'Accepted', 'Rejected'];
        foreach ($merchantStatuses as $merchantStatus) {
            MerchantStatus::factory()->create([
                'name' => $merchantStatus,
            ]);
        }
    }
}
