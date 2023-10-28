<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::group(['prefix' => 'v1'], function () {
    Route::post('/auth', [AuthController::class,'login'])->name('login');
    Route::get('/cities', [CityController::class,'index'])->name('city.index');
    Route::get('/provinces', [ProvinceController::class,'index'])->name('province.index');
    Route::get('/countries', [CountryController::class,'index'])->name('country.index');
    Route::get('/products/{product}', [ProductController::class,'show'])->name('product.show');
    Route::get('/postman', function () {
        return response()->file(storage_path('/app/scribe/collection.json'));
    })->name('scribe.postman');
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1'], function () {
    Route::get('/merchants/{merchant}', [MerchantController::class,'show'])->name('merchant.show');
    Route::get('/merchants/{merchant}/products', [MerchantController::class,'productIndex'])->name('merchant.productIndex');
    Route::put('/merchants', [MerchantController::class,'update'])->name('merchant.update');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});


/**
 * Fallback route
 * 
 * This route will be used if the requested route is not found.
 * 
 * @group Fallback
 */
Route::fallback(function(){
    return response()->json([
        'message' => 'Endpoint not found'
    ],404);
});
