<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductsController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/exam', [HomeController::class,'exam'])->name('exam');
// Route::get('/', function () {
//     return view('client.appLayout.index');
// });
Route::get('/home', function () {
    return view('client.home.index');
});
Route::get('/product', [ProductsController::class,'index'])->name('product');


