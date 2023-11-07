<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Success',
            'challenged by FDS',
            'Settlement',
            'Pending',
            'Denied',
            'Expired',
        ];

        foreach ($statuses as $status) {
            PaymentStatus::factory()->create([
                'description' => $status,
            ]);
        }
    }
}
