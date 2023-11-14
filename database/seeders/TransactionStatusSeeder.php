<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionStatuses = [
            [
                'id' => 10,
                'description' => 'Menunggu Konfirmasi Merchant',
            ],
            [
                'id' => 20,
                'description' => 'Menunggu Pembayaran',
            ],
            [
                'id' => 21,
                'description' => 'Menunggu Down Payment',
            ],
            [
                'id' => 22,
                'description' => 'Menunggu Pelunasan',
            ],
            [
                'id' => 30,
                'description' => 'Sedang Berlangsung',
            ],
            [
                'id' => 40,
                'description' => 'Menunggu Review',
            ],
            [
                'id' => 50,
                'description' => 'Selesai',
            ],
            [
                'id' => 90,
                'description' => 'Dibatalkan',
            ],
            [
                'id' => 91,
                'description' => 'Menunggu Konfirmasi Merchant',
            ],
            [
                'id' => 92,
                'description' => 'Menunggu Konfirmasi Customer',
            ],
        ];

        foreach ($transactionStatuses as $transactionStatus) {
            \App\Models\TransactionStatus::factory()->create($transactionStatus);
        }
    }
}
