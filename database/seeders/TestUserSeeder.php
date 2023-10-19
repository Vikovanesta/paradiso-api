<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\IncludeExclude;
use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\ScheduleDay;
use App\Models\Term;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'merchant',
            'email' => 'merchant@mail.com',
            'password' => 'password',
            'user_level' => 3,
            'is_email_verified' => true,
            'email_verified_at' => now(),
            'phone' => '081234567890',
            'status' => 1,
        ]);

        Merchant::create([
            'user_id' => 1,
            'merchant_level_id' => 1,
            'merchant_status_id' => 3,
            'name' => 'merchant',
            'ktp' => '1234567890123456',
        ]);

        MerchantProfile::create([
            'merchant_id' => 1,
            'address' => 'Jl. Test',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'logo' => 'logo.png',
            'banner' => 'banner.png',
        ]);

        Product::create([
            'merchant_id' => 1,
            'product_sub_category_id' => 1,
            'product_status_id' => 1,
            'city_id' => 1,
            'name' => 'product',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'duration' => 1,
            'start_date' => '16/10/2023',
            'end_date' => '17/10/2023',
            'price' => 100000,
            'unit' => 'unit',
            'thumbnail' => 'thumbnail.png',
            'address' => 'Jl. Test',
            'coordinate' => '123,123',
            'max_person' => 10,
            'min_person' => 1,
            'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'is_published' => false,
        ]);

        Faq::create([
            'product_id' => 1,
            'question' => 'question1',
            'answer' => 'answer1',
        ]);

        Faq::create([
            'product_id' => 1,
            'question' => 'question2',
            'answer' => 'answer2',
        ]);

        Term::create([
            'product_id' => 1,
            'term' => 'term1',
        ]);

        Term::create([
            'product_id' => 1,
            'term' => 'term2',
        ]);

        Schedule::create([
            'product_id' => 1,
            'date' => '16/10/2023',
            'title' => 'day 1'
        ]);

        ScheduleDay::create([
            'schedule_id' => 1,
            'start_time' => '08:00',
            'end_time' => '10:00',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);

        ScheduleDay::create([
            'schedule_id' => 1,
            'start_time' => '13:00',
            'end_time' => '14:00',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);

        IncludeExclude::create([
            'product_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'is_include' => true,
        ]);

        IncludeExclude::create([
            'product_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'is_include' => false,
        ]);

        Review::create([
            'product_id' => 1,
            'user_id' => 1,
            'review' => 'revieww',
            'rating' => 5,
        ]);

        ProductImage::create([
            'product_id' => 1,
            'image' => 'https://via.placeholder.com/640x480.png',
        ]);

        ProductImage::create([
            'product_id' => 1,
            'image' => 'https://via.placeholder.com/640x480.png',
        ]);

        DB::table('facility_product')->insert([
            [
                'product_id' => 1,
                'facility_id' => 2,
            ],
            [
                'product_id' => 1,
                'facility_id' => 3,
            ],
        ]);
    }
}
