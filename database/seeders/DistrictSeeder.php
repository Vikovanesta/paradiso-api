<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = array_map('str_getcsv', file(database_path('csv/districts.csv')));

        foreach ($districts as $district)
        {
            District::create([
                'id' => $district[0],
                'city_id' => $district[1],
                'name' => $district[2]
            ]);
        }
    }
}
