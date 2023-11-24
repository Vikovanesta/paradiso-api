<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\IncludeExclude;
use App\Models\Item;
use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductView;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\ScheduleDay;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\User;
use Database\Factories\ScheduleDayFactory;
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
        $user = User::create([
            'name' => 'merchant',
            'email' => 'merchant@mail.com',
            'password' => 'password',
            'user_level' => 3,
            'is_email_verified' => true,
            'email_verified_at' => now(),
            'phone' => '081234567890',
            'status' => 1,
        ]);

        BankAccount::create([
            'bank_id' => 1,
            'user_id' => 1,
            'name' => 'merchant',
            'account_number' => '1234567890',
            'is_merchant' => true,
        ]);

        $nerchant = Merchant::create([
            'user_id' => 1,
            'merchant_level_id' => 1,
            'merchant_status_id' => 3,
            'name' => 'merchant',
            'logo' => 'https://picsum.photos/100/100',
            'is_highlight' => false,
            'notes' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);

        MerchantProfile::create([
            'merchant_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'address' => 'Jl. Test',
            'banner' => 'https://picsum.photos/500/250',
            'ktp_number' => '1234567890123456',
            'ktp' => 'https://picsum.photos/500/250',
        ]);

        Product::create([
            'merchant_id' => 1,
            'product_sub_category_id' => 1,
            'product_status_id' => 1,
            'city_id' => 1,
            'name' => 'product',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'duration' => 1,
            'start_date' => '10/16/2023',
            'end_date' => '10/17/2023',
            'price' => 100000,
            'unit' => 'unit',
            'thumbnail' => 'https://picsum.photos/200/200',
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
            'date' => '10/16/2023',
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
            'image' => 'https://picsum.photos/360/360',
        ]);

        ProductImage::create([
            'product_id' => 1,
            'image' => 'https://picsum.photos/360/360',
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

        Transaction::create([
            'invoice_number' => 'INV/2021/10/1',
            'user_id' => 1,
            'transaction_status_id' => TransactionStatus::where('description', 'Selesai')->first()->id,
            'item_total_price' => 200000,
            'item_total_net_price' => 200000,
            'voucher_price' => 0,
            'amount' => 200000,
        ]);

        Item::create([
            'product_id' => 1,
            'transaction_id' => 1,
            'status_id' => 2,
            'net_price' => 200000,
            'price' => 200000,
            'product_name' => 'product',
            'product_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'start_date' => '10/16/2023',
            'end_date' => '10/17/2023',
            'quantity' => 2,
            'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);

        Payment::create([
            'transaction_id' => 1,
            'payment_status_id' => 1,
            'payment_order' => 2,
            'amount' => 200000,
            'payment_token' => 1234567,
            'due_date' => now()->addDays(7),
            'response' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);

        ProductView::factory()->count(50)->create([
            'product_id' => 1,
        ]);

        Product::factory()->count(10)
        ->has(
            Schedule::factory(rand(1, 3))
            ->has(ScheduleDayFactory::times(rand(1, 3)))
        )
        ->has(IncludeExclude::factory(2))
        ->has(Faq::factory(2))
        ->has(Term::factory(2))
        ->has(ProductImage::factory(2))
        ->has(
            ProductView::factory(10)
            ->rangeMonth(1)
        )
        ->create([
            'merchant_id' => 1,
        ]);


    }
}
