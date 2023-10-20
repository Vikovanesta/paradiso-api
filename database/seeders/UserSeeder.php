<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Faq;
use App\Models\IncludeExclude;
use App\Models\Merchant;
use App\Models\MerchantProfile;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\User;
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
        User::factory(2)
        ->has(
            Merchant::factory()
            ->has(MerchantProfile::factory())
            ->has(
                Product::factory(2)
                ->has(
                    Schedule::factory(2)
                    ->has(ScheduleDayFactory::times(2))
                )
                ->has(Review::factory(2))
                ->has(IncludeExclude::factory(2))
                ->has(Facility::factory(2))
                ->has(Faq::factory(2))
                ->has(Term::factory(2))
                ->has(ProductImage::factory(2))
            )
        )
        ->has(Transaction::factory(2))
        ->create();
    }
}
