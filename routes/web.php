<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\admin\ProductsController as AdminProductController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductCategorysController;


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

Route::get('/exam', [HomeController::class,'exam'])->name('exam');
// Route::get('/', function () {
//     return view('client.appLayout.index');
// });
Route::get('/home', function () {
    return view('client.home.index');
});
Route::get('/admin/pro', function () {
    return view('admin.product.them');
});




Route::get('/product', [ProductsController::class,'index'])->name('product');
Route::get('/ss', [ProductsController::class,'index'])->name('product');
 


Route::prefix('/')->name('site')->group(function(){
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::get('/product', [ProductsController::class,'index'])->name('product');
    Route::get('/news', [NewsController::class,'index'])->name('news');
    Route::get('payment',function(){
        return view('client.payment.index');
    });
    Route::get('thanks',function(){
        return view('client.thankyou.index');
    });
    //
    // Route::resource('/admin/product', AdminProductController::class);

    Route::prefix('/admin')->name('site')->group(function(){
        //-----------sản phẩm-------------
        Route::get('/product', [AdminProductController::class,'index'])->name('admin-product');
        Route::get('/product/create', [AdminProductController::class,'create']);
        Route::post('/product/create', [AdminProductController::class,'create_']);
        Route::get('/product/delete/{id}', [AdminProductController::class,'delete']);
        Route::get('/product/update/{id}', [AdminProductController::class,'update']);
        Route::post('/product/update/{id}', [AdminProductController::class,'update_']);
        //------------ danh mục sản phẩm ---------------
        Route::get('/product_category', [ProductCategorysController::class,'index']);
        Route::get('/product_category/create', [ProductCategorysController::class,'create']);
        Route::post('/product_category/create', [ProductCategorysController::class,'create_']);
        Route::get('/product_category/delete/{id}', [ProductCategorysController::class,'delete']);
        Route::get('/product_category/update/{id}', [ProductCategorysController::class,'update']);
        Route::post('/product_category/update/{id}', [ProductCategorysController::class,'update_']);
        //---------------tin tức ----------------
        Route::get('/news', [AdminNewsController::class,'index'])->name('news');

        Route::get('/', [AdminController::class,'index']);

    });

    
});