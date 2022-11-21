<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InterestController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class);
Route::resource('slider', SliderController::class);
Route::resource('faq', FaqController::class);
Route::resource('bank', BankController::class);
Route::resource('interest', InterestController::class);

Route::post('/interest/destroy', [InterestController::class, 'destroy']);
