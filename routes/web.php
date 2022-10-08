<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', [HomeController::class, 'index']);

Route::post('/create', [MessageController::class, 'create']);

# Ecommerce
Route::get('/', [LandingPageController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);


Route::view('/cart', 'ecommerce.cart');
Route::view('/checkout', 'ecommerce.checkout');
Route::view('/thankyou', 'ecommerce.thankyou');
