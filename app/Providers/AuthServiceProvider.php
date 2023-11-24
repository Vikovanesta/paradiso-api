<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Item;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\Voucher;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-merchantProfile', function ($user) {
            return $user->user_level === 3;
        });

        Gate::define('create-product', function ($user) {
            return $user->user_level === 3;
        });

        Gate::define('update-product', function ($user, Product $product) {
            return $user->user_level === 3 && $user->merchant->id === $product->merchant_id;
        });

        Gate::define('delete-product', function ($user, Product $product) {
            return $user->user_level === 3 && $user->merchant->id === $product->merchant_id;
        });
        
        Gate::define('view-transaction', function ($user, Transaction $transaction) {
            return $user->id === $transaction->user_id ||
                    ($user->user_level === 3 && $user->merchant->id === $transaction->items->first()->product->merchant_id);
        });

        Gate::define('view-item', function ($user, Item $item) {
            return $user->id === $item->transaction->user_id ||
                    ($user->user_level === 3 && $user->merchant->id === $item->product->merchant_id);
        });

        Gate::define('update-item', function($user, Item $item) {
            return $user->user_level === 3 && $user->merchant->id === $item->product->merchant_id;
        });

        Gate::define('update-reviewReply', function($user, Review $review) {
            return ($user->user_level === 3 && $user->merchant->id === $review->product->merchant_id);
        });

        Gate::define('create-voucher', function($user) {
            return $user->user_level === 3;
        });

        Gate::define('update-voucher', function($user, Voucher $voucher) {
            return $user->user_level === 3 && $user->merchant->id === $voucher->merchant_id;
        });
    }
}
