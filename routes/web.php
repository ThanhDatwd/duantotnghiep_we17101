<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\CategoriesNews;
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

Route::prefix('/')->name('client')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/product', [ProductsController::class, 'index'])->name('product');
    Route::get('/product/{slug}', [ProductsController::class, 'productDetail'])->name('product-detail');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [NewsController::class, 'newsDetail'])->name('news-detail');
    Route::get('payment', function () {
        return view('client.payment.index');
    });
    Route::get('thanks', function () {
        return view('client.thankyou.index');
    });
    //
    Route::prefix('/admin')->name('site')->group(function(){
        Route::get('/product', [ProductsController::class,'index'])->name('product');
        Route::get('/news', [AdminNewsController::class,'index'])->name('news');
        Route::get('/news/them', [AdminNewsController::class,'them'])->name('news.them');
        Route::post('/news/them', [AdminNewsController::class,'them1'])->name('news.them1');
        Route::get('/news/capnhat/{id}', [AdminNewsController::class,'capnhat'])->name('news.capnhat');
        Route::post('/news/capnhat/{id}', [AdminNewsController::class,'capnhat_'])->name('news.capnhat_');
        Route::get('/news/xoa/{id}', [AdminNewsController::class,'xoa'])->name('news.xoa');
    
        Route::get('/news/phuc-hoi/{id}', [AdminNewsController::class,'restore'])->name('admin.news.restore');
        Route::get('/news/phuc-hoi-tat-ca', [AdminNewsController::class,'restoreAll'])->name('admin.news.restoreAll');
      
        Route::get('/news/thung-rac', [AdminNewsController::class,'trash'])->name('admin.news.trash');

        // xoá nhiều
        Route::post('/news/xoa-nhieu', [
            AdminNewsController::class,
            'deleteMany'
        ]
        )->name('admin.news.deleteMany');

        Route::get('/', [AdminController::class,'index']);

    });
        Route::prefix('/admin')->name('site')->group(function(){
       
        Route::get('/categories_news', [CategoriesNews::class,'index'])->name('categories_news');
        Route::get('/categories_news/them', [CategoriesNews::class,'them'])->name('categories_news.them');
        Route::post('/categories_news/them', [CategoriesNews::class,'them1'])->name('categories_news.them1');
        Route::get('/categories_news/capnhat/{id}', [CategoriesNews::class,'capnhat'])->name('categories_news.capnhat');
        Route::post('/categories_news/capnhat/{id}', [CategoriesNews::class,'capnhat_'])->name('categories_news.capnhat_');
        Route::get('/categories_news/xoa/{id}', [CategoriesNews::class,'xoa'])->name('categories_news.xoa');
    
        Route::get('/categories_news/phuc-hoi/{id}', [CategoriesNews::class,'restore'])->name('admin.categories_news.restore');
        Route::get('/categories_news/phuc-hoi-tat-ca', [CategoriesNews::class,'restoreAll'])->name('admin.categories_news.restoreAll');
      
        Route::get('/categories_news/thung-rac', [CategoriesNews::class,'trash'])->name('admin.categories_news.trash');

        // xoá nhiều
        Route::post('/categories_news/xoa-nhieu', [
            CategoriesNews::class,
            'deleteMany'
        ]
        )->name('admin.categories_news.deleteMany');

        Route::get('/', [CategoriesNews::class,'index']);

    });

    
});
