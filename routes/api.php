<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
Route::post('/auth', [AuthController::class,'login'])->name('login');

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/merchant/{merchant}/product', [MerchantController::class,'productIndex'])->name('merchant.productIndex');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Endpoint not found'
    ],404);
});
