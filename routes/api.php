<?php

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
Route::post('/get_order_otp', [PaymentController::class,'get_order_otp'])->name('payment_cod');
Route::post('/confirm_order_otp', [PaymentController::class,'confirm_order_otp'])->name('payment_cod');

Route::get('/check', function (Request $request) {
    // return json_decode('xin chào');
    return response()->json([
        "message"=>"thành công nha"
    ],200);
});
