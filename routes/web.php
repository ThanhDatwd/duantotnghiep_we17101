<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\admin\ProductsController as AdminProductController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\CategoriesNews;
use App\Http\Controllers\admin\ProductCategorysController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\AddjobsController;
use App\Http\Controllers\PaymentController;
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
    Route::get('/category/{slug}', [ProductsController::class, 'category'])->name('category');
    Route::get('/category-group/{slug}', [ProductsController::class, 'group'])->name('category-group');
    // Route::get('/product/{slug}', [ProductDetailController::class, 'productDetail'])->name('product-detail');
    Route::get('/product/{slug}', [ProductsController::class, 'productDetail'])->name('product-detail');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [NewsController::class, 'newsDetail'])->name('news-detail');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    Route::get('/contact', [ContactController::class,'Contacts'])->name('contact');
    Route::get('/addjobs', [AddjobsController::class,'addjobs'])->name('addjobs');
    Route::get('/payment', [PaymentController::class,'index'])->name('payment');
    Route::post('/payment_vnpay', [PaymentController::class,'create_payment_vnpay_e'])->name('payment_vnpay');
    Route::get('/return_payment_vnpay', [PaymentController::class,'return_payment_vnpay_e'])->name('return_payment_vnpay');
    Route::post('/payment_momo_qr', [PaymentController::class,'create_payment_momo_qr'])->name('payment_momo_qr');
    Route::get('/return_payment_momo_qr', [PaymentController::class,'return_payment_momo_qr'])->name('return_payment_momo_qr');
    Route::post('/payment_momo_atm', [PaymentController::class,'create_payment_momo_atm'])->name('payment_momo_atm');
    Route::get('/return_payment_momo_atm', [PaymentController::class,'return_payment_momo_atm'])->name('return_payment_momo_atm');
    Route::get('thanks', function () {
        return view('client.thankyou.index');
    });
    Route::post('/add-to-cart', [ProductsController::class,'addToCart'])->name('add-to-cart');
    //
    // Route::resource('/admin/product', AdminProductController::class);

    Route::prefix('/admin')->name('site')->group(function(){
        //-----------------Admin Home-----------------
        Route::get('/', [AdminController::class,'index']);
        //-----------Admin Product-------------
        Route::get('/product', [AdminProductController::class,'index'])->name('admin-product');
        Route::get('/product/create', [AdminProductController::class,'create']);
        Route::post('/product/create', [AdminProductController::class,'create_']);
        Route::get('/product/delete/{id}', [AdminProductController::class,'delete']);
        Route::get('/product/forceDelete/{id}', [AdminProductController::class,'forceDelete']);
        Route::get('/product/trashed',[AdminProductController::class,'trashed']);
        Route::get('/product/restore/{id}',[AdminProductController::class,'restore']);
        Route::get('product/restore-all',[AdminProductController::class,'restoreAll']);
        Route::get('/product/update/{id}', [AdminProductController::class,'update']);
        Route::post('/product/update/{id}', [AdminProductController::class,'update_']);
        
        //------------ Admin category_product ---------------
        Route::get('/product_category', [ProductCategorysController::class,'index'])->name('admin-product_category');
        Route::get('/product_category/create', [ProductCategorysController::class,'create']);
        Route::post('/product_category/create', [ProductCategorysController::class,'create_']);
        Route::get('/product_category/delete/{id}', [ProductCategorysController::class,'delete']);
        Route::get('/product_category/forceDelete/{id}', [ProductCategorysController::class,'forceDelete']);
        Route::get('/product_category/trashed',[ProductCategorysController::class,'trashed']);
        Route::get('/product_category/restore/{id}',[ProductCategorysController::class,'restore']);
        Route::get('product_category/restore-all',[ProductCategorysController::class,'restoreAll']);
        Route::get('/product_category/update/{id}', [ProductCategorysController::class,'update']);
        Route::post('/product_category/update/{id}', [ProductCategorysController::class,'update_']);
       
        //---------------Admin News ----------------
        Route::get('/news', [AdminNewsController::class,'index'])->name('news');
        Route::get('/news/them', [AdminNewsController::class,'them'])->name('news.them');
        Route::post('/news/them', [AdminNewsController::class,'them1'])->name('news.them1');
        Route::get('/news/capnhat/{id}', [AdminNewsController::class,'capnhat'])->name('news.capnhat');
        Route::post('/news/capnhat/{id}', [AdminNewsController::class,'capnhat_'])->name('news.capnhat_');
        Route::get('/news/xoa/{id}', [AdminNewsController::class,'xoa'])->name('news.xoa');
        Route::get('/news/phuc-hoi/{id}', [AdminNewsController::class,'restore'])->name('admin.news.restore');
        Route::get('/news/phuc-hoi-tat-ca', [AdminNewsController::class,'restoreAll'])->name('admin.news.restoreAll');
        Route::get('/news/thung-rac', [AdminNewsController::class,'trash'])->name('admin.news.trash');
        Route::post('/news/xoa-nhieu', [sAdminNewsController::class,'deleteMany'])->name('admin.news.deleteMany');

        //-----------------Admin Category_news ------------------------
        Route::get('/categories_news', [CategoriesNews::class,'index'])->name('categories_news');
        Route::get('/categories_news/them', [CategoriesNews::class,'them'])->name('categories_news.them');
        Route::post('/categories_news/them', [CategoriesNews::class,'them1'])->name('categories_news.them1');
        Route::get('/categories_news/capnhat/{id}', [CategoriesNews::class,'capnhat'])->name('categories_news.capnhat');
        Route::post('/categories_news/capnhat/{id}', [CategoriesNews::class,'capnhat_'])->name('categories_news.capnhat_');
        Route::get('/categories_news/xoa/{id}', [CategoriesNews::class,'xoa'])->name('categories_news.xoa'); 
        Route::get('/categories_news/phuc-hoi/{id}', [CategoriesNews::class,'restore'])->name('admin.categories_news.restore');
        Route::get('/categories_news/phuc-hoi-tat-ca', [CategoriesNews::class,'restoreAll'])->name('admin.categories_news.restoreAll'); 
        Route::get('/categories_news/thung-rac', [CategoriesNews::class,'trash'])->name('admin.categories_news.trash');
        Route::post('/categories_news/xoa-nhieu', [CategoriesNews::class,'deleteMany'])->name('admin.categories_news.deleteMany');

       //-------------------Admin Brands------------------------
       Route::get('/brand', [BrandController::class,'index'])->name('admin-brand');
       Route::get('/brand/create', [BrandController::class,'create'])->name('admin.brand.create');
       Route::post('/brand/create', [BrandController::class,'create_'])->name('admin.brand.create_');
       Route::get('/brand/delete/{id}', [BrandController::class,'delete'])->name('admin.brand.delete');
       Route::get('/brand/forceDelete/{id}', [BrandController::class,'forceDelete'])->name('admin.brand.forceDelete');
       Route::get('/brand/trashed',[BrandController::class,'trashed'])->name('admin.brand.trashed');
       Route::get('/brand/restore/{id}',[BrandController::class,'restore'])->name('admin.brand.restore');
       Route::get('brand/restore-all',[BrandController::class,'restoreAll'])->name('admin.brand.retoreAll');
       Route::get('/brand/update/{id}', [BrandController::class,'update'])->name('admin.brand.update');
       Route::post('/brand/update/{id}', [BrandController::class,'update_'])->name('admin.brand.update_');



    });

    
});
