<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', [ApiController::class, 'getproducts']);
Route::get('/product/{id}', [ApiController::class, 'getproduct']);
Route::get('/slider', [ApiController::class, 'getsliders']);
Route::get('/bank', [ApiController::class, 'getbanks']);
Route::get('/interest', [ApiController::class, 'getinterests']);
Route::get('/interest/{duration}/{bankid}', [ApiController::class, 'getInterest']);
Route::get('/faq', [ApiController::class, 'getfaqs']);
