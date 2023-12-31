<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Traits\MimeType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/api/v1/');
});

Route::get('/api/v1', function () {
    return view('scribe.index');
})->name('api.v1.docs');

Route::get('/api/sanctum/csrf-cookie', function () {
    return redirect('/sanctum/csrf-cookie');
});

Route::get('/img/{dir}/{fileName}', [FileController::class, 'showImage'])->where('dir', '(.*(?:%2F:)?.*)');
