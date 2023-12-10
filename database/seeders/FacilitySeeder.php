<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            'wifi', 
            'parking', 
            'swimming pool', 
            'restaurant', 
            '24-hour front desk', 
            'elevator',
            'wheelchair access',
            'fitness center',
            'meeting facilities',
            'airport transfer',
        ];
        
        foreach ($facilities as $facility) {
            Facility::factory()->create([
                'name' => $facility,
            ]);
        }
    }
}
