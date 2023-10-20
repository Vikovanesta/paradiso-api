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
        $facilities = ['wifi', 'parkir', 'ac', 'tv', 'kamar mandi dalam', 'kamar mandi luar'];
        foreach ($facilities as $facility) {
            Facility::factory()->create([
                'name' => $facility,
            ]);
        }
    }
}
