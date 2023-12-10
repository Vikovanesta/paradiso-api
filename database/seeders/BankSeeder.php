<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = array_map('str_getcsv', file(database_path('csv/banks.csv')));
        array_shift($banks);

        foreach ($banks as $bank) {
            Bank::factory()->create(
                [
                    // 'id' => $bank[1],
                    'name' => $bank[0],
                    'code' => $bank[1],
                ]
            );
        }
    }
}
