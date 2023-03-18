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
use App\Http\Controllers\client\AddjobController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CoupouController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\client\AuthController;

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

Route::prefix('/')->name('client')->middleware('auth.client')->group(function () {
   Route::get('/account', [AccountController::class, 'account'])->name('account');
});

Route::prefix('/')->name('client')->group(function () {
    Route::get('/login',[AuthController::class,'show_login_user'])->name('show-login');
    Route::get('/logout',[AuthController::class,'logout_user'])->name('logout-user');
    Route::post('/login',[AuthController::class,'login_user'])->name('login');
    Route::get('/register',[AuthController::class,'show_register_user'])->name('show-register');
    Route::post('/register',[AuthController::class,'register_user'])->name('register');
    Route::get('/email/verify/{token}',[AuthController::class,'verify_email'])->name('verify-email');

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{slug}', [ProductsController::class, 'category'])->name('category');
    Route::get('/category-group', [ProductsController::class, 'group_all'])->name('category-group-all');
    Route::get('/category-group/{slug}', [ProductsController::class, 'group'])->name('category-group');
    Route::get('/product/{slug}', [ProductsController::class, 'productDetail'])->name('product-detail');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [NewsController::class, 'newsDetail'])->name('news-detail');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/contact', [ContactController::class,'contact'])->name('contact');
    Route::get('/addjobs', [AddjobController::class,'index'])->name('addjobs');
    Route::get('/payment', [PaymentController::class,'index'])->name('payment');
    Route::post('/payment_cod', [PaymentController::class,'create_payment_cod'])->name('payment_cod');
    Route::post('/payment_vnpay', [PaymentController::class,'create_payment_vnpay_e'])->name('payment_vnpay');
    Route::get('/return_payment_vnpay', [PaymentController::class,'return_payment_vnpay_e'])->name('return_payment_vnpay');
    Route::post('/payment_momo_qr', [PaymentController::class,'create_payment_momo_qr'])->name('payment_momo_qr');
    Route::get('/return_payment_momo_qr', [PaymentController::class,'return_payment_momo_qr'])->name('return_payment_momo_qr');
    Route::post('/payment_momo_atm', [PaymentController::class,'create_payment_momo_atm'])->name('payment_momo_atm');
    Route::get('/return_payment_momo_atm', [PaymentController::class,'return_payment_momo_atm'])->name('return_payment_momo_atm');
    Route::get('thanks', function () {
        return view('client.thankyou.index');
    })->name('page-thanks');
    Route::post('/add-to-cart', [ProductsController::class,'addToCart'])->name('add-to-cart');
    Route::post('/minus-to-cart', [ProductsController::class,'minusToCart'])->name('minus-to-cart');
    Route::post('/remove-to-cart', [ProductsController::class,'removeToCart'])->name('remove-to-cart');
    Route::post('/remove-all-cart', [ProductsController::class,'removeAllCart'])->name('remove-all-cart');
    Route::get('/search', [ProductsController::class,'search'])->name('search');
   
});
    //
    // Route::resource('/admin/product', AdminProductController::class);
    Route::prefix('/admin')->name('site')->group(function(){
        Route::get('/login',[AuthController::class,'show_login_admin'])->name('show-login');
        Route::post('/login',[AuthController::class,'login_admin'])->name('login');
        Route::get('/admin_users/them', [AdminUserController::class,'them'])->name('admin.admin_users.create');
    Route::post('/admin_users/them', [AdminUserController::class,'them1'])->name('admin.admin_users.create_');
    });
    // Route::prefix('/admin')->name('site')->middleware('auth.admin')->group(function(){
    Route::prefix('/admin')->name('site')->group(function(){

        //-----------------Admin Home-----------------
        Route::get('/', [AdminController::class,'index'])->name('dashboard');
        //-----------Admin Product-------------
        Route::get('/product', [AdminProductController::class,'index'])->name('admin-product');
        Route::get('/product/create', [AdminProductController::class,'create'])->name('admin.product.create');
        Route::post('/product/create', [AdminProductController::class,'create_'])->name('admin.product.create_');
        Route::get('/product/delete/{id}', [AdminProductController::class,'delete'])->name('admin.product.delete');
        Route::get('/product/trashed/forceDelete/{id}', [AdminProductController::class,'forceDelete'])->name('admin.product.force');;
        Route::get('/product/trashed',[AdminProductController::class,'trashed'])->name('admin.product.trashed');
        Route::get('/product/restore/{id}',[AdminProductController::class,'restore'])->name('admin.product.restore');
        Route::get('product/restore-all',[AdminProductController::class,'restoreAll'])->name('admin.product.restoreAll');
        Route::get('/product/update/{id}', [AdminProductController::class,'update'])->name('admin.product.update');
        Route::post('/product/update/{id}', [AdminProductController::class,'update_'])->name('admin.product.update_');
        
        //------------ Admin category_product ---------------
        Route::get('/product_category', [ProductCategorysController::class,'index'])->name('admin-product_category');
        Route::get('/product_category/create', [ProductCategorysController::class,'create']);
        Route::post('/product_category/create', [ProductCategorysController::class,'create_']);
        Route::get('/product_category/delete/{id}', [ProductCategorysController::class,'delete']);
        Route::get('/product_category/trashed/forceDelete/{id}', [ProductCategorysController::class,'forceDelete']);
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
        Route::post('/news/xoa-nhieu', [AdminNewsController::class,'deleteMany'])->name('admin.news.deleteMany');

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
    Route::get('/brand/trashed/forceDelete/{id}', [BrandController::class,'forceDelete'])->name('admin.brand.forceDelete');
    //    Route::get('/brand/forceDelete/{id}', [BrandController::class,'forceDelete'])->name('admin.brand.forceDelete');
    Route::get('/brand/trashed',[BrandController::class,'trashed'])->name('admin.brand.trashed');
    Route::get('/brand/restore/{id}',[BrandController::class,'restore'])->name('admin.brand.restore');
    Route::get('brand/restore-all',[BrandController::class,'restoreAll'])->name('admin.brand.retoreAll');
    Route::get('/brand/update/{id}', [BrandController::class,'update'])->name('admin.brand.update');
    Route::post('/brand/update/{id}', [BrandController::class,'update_'])->name('admin.brand.update_');

    //------------------- Admin Oder-----------------------
    Route::get('/order', [OrderController::class,'index'])->name('admin-order');
    Route::get('/order/detail/{id}', [OrderController::class,'detail'])->name('admin.order.detail');
    Route::post('/order/detail/{id}', [OrderController::class,'update'])->name('admin.order.update');

    //------------------ Admin Coupon-----------------------
    Route::get('/coupon', [CoupouController::class,'index'])->name('admin-coupon');
    Route::get('/coupon/create', [CoupouController::class,'create'])->name('admin.coupon.create');
    Route::post('/coupon/create', [CoupouController::class,'create_'])->name('admin.coupon.create_');
    Route::get('/coupon/delete/{id}', [CoupouController::class,'delete'])->name('admin.coupon.delete');
    Route::get('/coupon/trashed/forceDelete/{id}', [CoupouController::class,'forceDelete'])->name('admin.coupon.forceDelete');
    Route::get('/coupon/trashed',[CoupouController::class,'trashed'])->name('admin.coupon.trashed');
    Route::get('/coupon/restore/{id}',[CoupouController::class,'restore'])->name('admin.coupon.restore');
    Route::get('coupon/restore-all',[CoupouController::class,'restoreAll'])->name('admin.coupon.retoreAll');
    Route::get('/coupon/update/{id}', [CoupouController::class,'update'])->name('admin.coupon.update');
    Route::post('/coupon/update/{id}', [CoupouController::class,'update_'])->name('admin.coupon.update_');
        //-------------------Admin User------------------------
    Route::get('/admin_users', [AdminUserController::class,'index'])->name('admin-user');
    // Route::get('/admin_users/them', [AdminUserController::class,'them'])->name('admin.admin_users.create');
    // Route::post('/admin_users/them', [AdminUserController::class,'them1'])->name('admin.admin_users.create_');
    Route::get('/admin_users/capnhat/{id}', [AdminUserController::class,'capnhat'])->name('admin.admin_users.update');
    Route::post('/admin_users/capnhat/{id}', [AdminUserController::class,'capnhat_'])->name('admin.admin_users.update_');
    Route::get('/admin_users/xoa/{id}', [AdminUserController::class,'xoa'])->name('admin.admin_users.delete');
    Route::get('/admin_users/phuc-hoi/{id}', [AdminUserController::class,'restore'])->name('admin.admin_users.restore');



});

    