<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Scribe;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Scribe::beforeResponseCall(function (Request $request, ExtractedEndpointData $endpointData) {
            $user = User::first();
            Sanctum::actingAs($user, ['*']);
        });
    }
}
