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
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Database\Factories\ScheduleDayFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Event\Code\Test;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate superadmin
        User::factory()->superadmin()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'phone' => '081234067890',
            'password' => 'password',
        ]);

        // Generate admin
        User::factory()->admin()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'phone' => '081334567891',
            'password' => 'password',
        ]);

        // User::factory(1)
        // ->merchant()
        // ->has(BankAccount::factory())
        // ->has(
        //     Merchant::factory()
        //     ->has(MerchantProfile::factory())
        //     ->has(
        //         Product::factory(2)
        //         ->has(
        //             Schedule::factory(2)
        //             ->has(ScheduleDayFactory::times(2))
        //         )
        //         ->has(Review::factory(2))
        //         ->has(IncludeExclude::factory(2))
        //         ->has(Facility::factory(2))
        //         ->has(Faq::factory(2))
        //         ->has(Term::factory(2))
        //         ->has(ProductImage::factory(2))
        //     )
        // )
        // ->create();

        // Generate customer
        User::factory(4)
        ->customer()
        ->has(BankAccount::factory())
        ->has(
            Transaction::factory(2)
            ->has(Item::factory(rand(1, 3)))
            ->has(Payment::factory())   
            ->has(Wallet::factory())
            ->has(Review::factory())
        )
        ->create();
    }
}
