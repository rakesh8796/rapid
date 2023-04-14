<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', [App\Http\Controllers\RetailerController::class, 'index']);
// Route::get('/retailer', [App\Http\Controllers\RetailerController::class, 'index']);
Route::get('/', [App\Http\Controllers\RetailerController::class, 'orders']);
Route::get('/retailer', [App\Http\Controllers\RetailerController::class, 'orders']);

Route::get('/retailer/orders', [App\Http\Controllers\RetailerController::class, 'orders']);
Route::get('/retailer/bulk-order', [App\Http\Controllers\RetailerController::class, 'bulkorder']);
Route::get('/retailer/single-order', [App\Http\Controllers\RetailerController::class, 'singleorder']);
Route::get('/retailer/book-single-order', [App\Http\Controllers\RetailerController::class, 'booksingleorder']);
Route::get('/retailer/mis-order', [App\Http\Controllers\RetailerController::class, 'misorder']);
Route::get('/retailer/pincode', [App\Http\Controllers\RetailerController::class, 'pincode']);
Route::get('/retailer/order-tracking', [App\Http\Controllers\RetailerController::class, 'tracking']);
Route::get('/retailer/print-shipping-label', [App\Http\Controllers\RetailerController::class, 'printlabel']);
Route::get('/retailer/wallet', [App\Http\Controllers\RetailerController::class, 'wallet']);
Route::get('/retailer/calculator', [App\Http\Controllers\RetailerController::class, 'calculator']);




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
