<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\ProductSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['duration', 'integer'],
            ['duration_unit', 'string'], // hour, day, week, month, year
            ['min_person', 'integer'],
            ['max_person', 'integer'],
            ['min_quantity', 'integer'],
            ['max_quantity', 'integer'],
            ['baggage', 'integer'],
            ['fuel', 'string'],
            ['transmission', 'string'],
            ['color', 'string'],
            ['capacity', 'integer'],
            ['year_of_production', 'integer'],
            ['include_driver', 'integer'],
            ['room_area', 'integer'], // m2
            ['room_count', 'integer'],
        ];

        foreach ($fields as $field) {
            Field::create([
                'name' => $field[0],
                'data_type' => $field[1],
            ]);
        }

        $paketWisataFields = [
            'duration',
            'duration_unit',
            'min_person',
            'max_person',
        ];

        $tiketMasukFields = [
            'min_quantity',
            'max_quantity',
        ];

        $rentalFields = [
            'capacity',
            'baggage',
            'fuel',
            'transmission',
            'color',
            'year_of_production',
            'include_driver',
        ];

        $guideFields = [
            'duration',
            'duration_unit',
        ];

        $kamarPenginapanFields = [
            'room_area',
            'capacity',
            'room_count',
        ];

        $productSubCategories = ProductSubCategory::all();

        foreach ($productSubCategories as $productSubCategory) {
            if ($productSubCategory->name === 'Paket Wisata') {
                $productSubCategory->fields()->attach(Field::whereIn('name', $paketWisataFields)->get());
            } elseif ($productSubCategory->name === 'Tiket Masuk') {
                $productSubCategory->fields()->attach(Field::whereIn('name', $tiketMasukFields)->get());
            } elseif ($productSubCategory->name === 'Rental') {
                $productSubCategory->fields()->attach(Field::whereIn('name', $rentalFields)->get());
            } elseif ($productSubCategory->name === 'Guide') {
                $productSubCategory->fields()->attach(Field::whereIn('name', $guideFields)->get());
            } elseif ($productSubCategory->name === 'Kamar Penginapan') {
                $productSubCategory->fields()->attach(Field::whereIn('name', $kamarPenginapanFields)->get());
            }
        }
    }
}
