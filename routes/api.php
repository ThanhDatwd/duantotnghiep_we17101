<?php

use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\api\StatisticalController;
use App\Http\Controllers\client\CouponController;
use App\Http\Controllers\PaymentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/get_order_otp', [PaymentController::class,'get_order_otp']);
Route::post('/confirm_order_otp', [PaymentController::class,'confirm_order_otp']);
Route::post('/apply_coupon_code', [CouponController::class,'applyCouponCode']);
Route::get('/statistical/orders', [StatisticalController::class,'statistical__order']);
Route::get('/statistical/dtln', [StatisticalController::class,'statistical__dt']);
Route::post('/purchase', [PurchaseController::class,'purchase']);

Route::get('/check', function (Request $request) {
    return response()->json([
        "message"=>"thành công nha"
    ],200);
});
