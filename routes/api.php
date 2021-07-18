<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//users
Route::resource('users',UserController::class);

//login
Route::post('login',[App\Http\Controllers\Api\LoginController::class, 'login']);
Route::get('loginUser',[App\Http\Controllers\Api\LoginController::class, 'loginUser']);
Route::get('viewProfile',[App\Http\Controllers\Api\LoginController::class, 'viewProfile']);
Route::get('getNotifications',[App\Http\Controllers\Api\LoginController::class, 'getNotifications']);
Route::post('changePass',[App\Http\Controllers\Api\LoginController::class, 'changePass']);
Route::post('checkPass',[App\Http\Controllers\Api\LoginController::class, 'checkPass']);
Route::put('updateProfile/{id}',[App\Http\Controllers\Api\LoginController::class, 'updateProfile']);
Route::get('forgotPassword',[App\Http\Controllers\Api\LoginController::class, 'forgotPassword']);
Route::post('changePassword',[App\Http\Controllers\Api\LoginController::class, 'changePassword']);

//user QoutationsLog
Route::get('getQuoatationDetail',[App\Http\Controllers\Api\QuoatationController::class,'getQuoatationDetail']);
Route::get('getSearches',[App\Http\Controllers\Api\QuoatationController::class,'index']);
Route::get('getQuations',[App\Http\Controllers\Api\QuoatationController::class,'getQuations']);
//UserPaymentLog
Route::get('getUserPaymentLog',[App\Http\Controllers\Api\PaymentController::class, 'getUserPaymentLog']);
//UserOrderLog
Route::get('getUserOrderLog',[App\Http\Controllers\Api\OrderController::class, 'getUserOrderLog']);
Route::get('getUserOrderDetails',[App\Http\Controllers\Api\OrderController::class, 'getUserOrderDetails']);