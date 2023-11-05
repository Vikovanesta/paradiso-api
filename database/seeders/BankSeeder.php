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
        $banks = [
            [
                'name' => 'BCA',
                'code' => '014',
            ],
            [
                'name' => 'Bank Mandiri',
                'code' => '008',
            ],
            [
                'name' => 'BNI',
                'code' => '009',
            ],
            [
                'name' => 'BRI',
                'code' => '002',
            ],
            [
                'name' => 'Bank CIMB Niaga',
                'code' => '022',
            ],
            [
                'name' => 'Bank Permata',
                'code' => '013',
            ],
            [
                'name' => 'Bank Danamon',
                'code' => '011',
            ],
            [
                'name' => 'Bank OCBC NISP',
                'code' => '028',
            ],
            [
                'name' => 'Bank Panin',
                'code' => '019',
            ],
            [
                'name' => 'Bank BII Maybank',
                'code' => '016',
            ],
            [
                'name' => 'BTN',
                'code' => '200'
            ]
        ];

        foreach ($banks as $bank) {
            Bank::factory()->create($bank);
        }
    }
}
