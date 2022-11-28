<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicereqController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleColorController;
use App\Http\Controllers\VehicleBrandController;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class);
Route::resource('slider', SliderController::class);
Route::resource('faq', FaqController::class);
Route::resource('bank', BankController::class);
Route::resource('service', ServiceController::class);
Route::post('/service/destroy', [ServiceController::class, 'destroy']);
Route::resource('mechanic', MechanicController::class);
Route::post('/mechanic/destroy', [MechanicController::class, 'destroy']);
Route::resource('customer', CustomerController::class);
Route::post('/customer/destroy', [CustomerController::class, 'destroy']);


Route::resource('vehicle', VehicleController::class);
Route::post('/vehicle/destroy', [VehicleController::class, 'destroy']);
Route::resource('vehiclecolor', VehicleColorController::class);
Route::post('/vehiclecolor/destroy', [VehicleColorController::class, 'destroy']);
Route::resource('vehiclebrand', VehicleBrandController::class);
Route::post('/vehiclebrand/destroy', [VehicleBrandController::class, 'destroy']);

Route::resource('vehicleCat', VehicleCategoryController::class);
Route::post('/vehicleCat/destroy', [VehicleCategoryController::class, 'destroy']);

Route::resource('servicereq', ServicereqController::class);
Route::post('/servicereq/destroy', [ServicereqController::class, 'destroy']);


//for ajax request 
Route::get('vehicledata/{id}', [App\Http\Controllers\VehicleController::class, 'show']);
