<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\AdminController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Router;

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

Route::get('/exam', [HomeController::class, 'exam'])->name('exam');
// Route::get('/', function () {
//     return view('client.appLayout.index');
// });
Route::get('/home', function () {
    return view('client.home.index');
});
Route::get('/admin/pro', function () {
    return view('admin.product.them');
});



Route::prefix('/')->name('site')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/product/{slug}', [ProductDetailController::class, 'productDetail'])->name('product-detail');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/product', [ProductsController::class, 'index'])->name('product');
Route::get('/ss', [ProductsController::class, 'index'])->name('product');



Route::prefix('/')->name('site')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/product', [ProductsController::class, 'index'])->name('product');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('payment', function () {
        return view('client.payment.index');
    });
    Route::get('thanks', function () {
        return view('client.thankyou.index');
    });
});
    //
    Route::prefix('/admin')->name('site')->group(function () {
        Route::get('/product', [ProductsController::class, 'index'])->name('admin-product');
        Route::get('/news', [AdminNewsController::class, 'index'])->name('news');
        Route::get('/', [AdminController::class, 'index']);
    });
});

