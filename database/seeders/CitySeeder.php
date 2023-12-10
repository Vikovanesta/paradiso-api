<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = array_map('str_getcsv', file(database_path('csv/regencies.csv')));

        foreach($cities as $city) {
            City::factory()->create([
                'id' => $city[0], // 'id' => '1671
                'province_id' => $city[1],
                'name' => $city[2]
            ]);
        }
    }
}
