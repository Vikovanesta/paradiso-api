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
        $facilities = ['wifi', 'parkir', 'ac', 'tv', 'kamar mandi dalam', 'kamar mandi luar', 'dapur', 'kulkas', 'dispenser', 'kompor', 'peralatan masak', 'peralatan makan', 'peralatan mandi', 'peralatan tidur', 'peralatan kebersihan', 'peralatan ibadah', 'peralatan bayi', 'peralatan hiburan', 'peralatan olahraga', 'peralatan kantor', 'peralatan keamanan', 'peralatan kesehatan', 'peralatan binatu', 'peralatan kebun', 'peralatan kendaraan', 'peralatan hewan peliharaan', 'peralatan lainnya'];
        foreach ($facilities as $facility) {
            Facility::factory()->create([
                'name' => $facility,
            ]);
        }
    }
}
