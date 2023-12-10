<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = array_map('str_getcsv', file(database_path('csv/provinces.csv')));

        foreach($provinces as $province) {
            Province::create([
                'id' => $province[0],
                'name' => $province[1],
                'country_id' => 1
            ]);
        }
    }
}
