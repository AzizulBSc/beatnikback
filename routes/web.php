<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('service', ServiceController::class);
Route::post('/service/destroy', [ServiceController::class, 'destroy']);
Route::resource('mechanic', MechanicController::class);
Route::post('/mechanic/destroy', [MechanicController::class, 'destroy']);

Route::resource('customer', HomeController::class);
Route::post('/customer/destroy', [HomeController::class, 'destroy']);





Route::resource('vehicleCat', VehicleCategoryController::class);
Route::post('/vehicleCat/destroy', [VehicleCategoryController::class, 'destroy']);
