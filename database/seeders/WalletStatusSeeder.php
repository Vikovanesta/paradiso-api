<?php

namespace Database\Seeders;

use App\Models\WalletStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'requested',
            'processed',
            'rejected',
            'done',
        ];

        foreach ($statuses as $status) {
            WalletStatus::factory()->create([
                'description' => $status,
            ]);
        }
    }
}
