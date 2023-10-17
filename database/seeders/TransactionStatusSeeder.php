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
                'name' => '10',
                'description' => 'Menunggu Konfirmasi Merchant',
            ],
            [
                'name' => '20',
                'description' => 'Menunggu Pembayaran',
            ],
            [
                'name' => '21',
                'description' => 'Menunggu Down Payment',
            ],
            [
                'name' => '22',
                'description' => 'Menunggu Pelunasan',
            ],
            [
                'name' => '30',
                'description' => 'Sedang Berlangsung',
            ],
            [
                'name' => '40',
                'description' => 'Menunggu Review',
            ],
            [
                'name' => '50',
                'description' => 'Selesai',
            ],
            [
                'name' => '90',
                'description' => 'Dibatalkan',
            ],
            [
                'name' => '91',
                'description' => 'Menunggu Konfirmasi Merchant',
            ],
            [
                'name' => '92',
                'description' => 'Menunggu Konfirmasi Customer',
            ],
        ];

        foreach ($transactionStatuses as $transactionStatus) {
            \App\Models\TransactionStatus::factory()->create($transactionStatus);
        }
    }
}
