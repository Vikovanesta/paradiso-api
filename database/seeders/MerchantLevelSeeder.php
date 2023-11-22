<?php

namespace Database\Seeders;

use App\Models\MerchantLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchantLevels = ['standart', 'bronze', 'silver', 'gold', 'platinum'];
        foreach ($merchantLevels as $merchantLevel) {
            MerchantLevel::factory()->create([
                'name' => $merchantLevel,
            ]);
        }
    }
}
