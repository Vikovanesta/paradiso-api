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
        $provinces = [
            [ 'Aceh', 'ID-AC'],
            [ 'Sumatra Utara', 'ID-SU'],
            [ 'Sumatra Barat', 'ID-SB'],
            [ 'Riau', 'ID-RI'],
            [ 'Jambi', 'ID-JA'],
            [ 'Sumatra Selatan', 'ID-SS'],
            [ 'Bengkulu', 'ID-BE'],
            [ 'Lampung', 'ID-LA'],
            [ 'Kepulauan Bangka Belitung', 'ID-BB'],
            [ 'Kepulauan Riau', 'ID-KR'],
            [ 'Daerah Khusus Ibukota Jakarta', 'ID-JB'],
            [ 'Jawa Barat', 'ID-JB'],
            [ 'Jawa Tengah', 'ID-JT'],
            [ 'Daerah Istimewa Yogyakarta', 'ID-YO'],
            [ 'Jawa Timur', 'ID-JI'],
            [ 'Banten', 'ID-BT'],
            [ 'Bali', 'ID-BA'],
            [ 'Nusa Tenggara Barat', 'ID-NB'],
            [ 'Nusa Tenggara Timur', 'ID-NT'],
            [ 'Kalimantan Barat', 'ID-KB'],
            [ 'Kalimantan Tengah', 'ID-KT'],
            [ 'Kalimantan Selatan', 'ID-KS'],
            [ 'Kalimantan Timur', 'ID-KI'],
            [ 'Kalimantan Utara', 'ID-KU'],
            [ 'Sulawesi Utara', 'ID-SA'],
            [ 'Sulawesi Tengah', 'ID-ST'],
            [ 'Sulawesi Selatan', 'ID-SN'],
            [ 'Sulawesi Tenggara', 'ID-SG'],
            [ 'Gorontalo', 'ID-GO'],
            [ 'Sulawesi Barat', 'ID-SR'],
            [ 'Maluku', 'ID-MA'],
            [ 'Maluku Utara', 'ID-MU'],
            [ 'Papua', 'ID-PA'],
            [ 'Papua Barat', 'ID-PB'],
        ];

        foreach($provinces as $province) {
            Province::create([
                'name' => $province[0],
                'country_id' => 1,
            ]);
        }
    }
}
