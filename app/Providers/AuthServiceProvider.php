<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\ChatRoom;
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
            return $user->isMerchant();
        });

        Gate::define('create-product', function ($user) {
            return $user->isMerchant();
        });

        Gate::define('update-product', function ($user, Product $product) {
            return $user->isMerchant() && $product->isOwnedBy($user->merchant);
        });

        Gate::define('delete-product', function ($user, Product $product) {
            return $user->isMerchant() && $product->isOwnedBy($user->merchant);
        });
        
        Gate::define('view-transaction', function ($user, Transaction $transaction) {
            return $transaction->isOwnedBy($user) ||
                    ($user->isMerchant() && $transaction->items->first()->product->isOwnedBy($user->merchant));
        });

        Gate::define('view-item', function ($user, Item $item) {
            return $item->transaction->isOwnedBy($user) ||
                    ($user->isMerchant() && $item->product->isOwnedBy($user->merchant));
        });

        Gate::define('update-item', function($user, Item $item) {
            return $user->isMerchant() && $item->product->isOwnedBy($user->merchant);
        });

        Gate::define('update-reviewReply', function($user, Review $review) {
            return ($user->isMerchant() && $review->product->isOwnedBy($user->merchant));
        });

        Gate::define('create-voucher', function($user) {
            return $user->isMerchant();
        });

        Gate::define('update-voucher', function($user, Voucher $voucher) {
            return $user->isMerchant() && $voucher->isOwnedBy($user->merchant);
        });

        Gate::define('view-chatRoom', function($user, ChatRoom $chatRoom) {
            $participants = $chatRoom->users->pluck('id')->toArray();
            return  in_array($user->id, $participants) ;
        });
    }
}
