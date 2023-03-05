<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\news;
// đơn hàng
use App\Models\order;
// khách hàng
use App\Models\customer;

class AdminController extends Controller
{
    //
public function index(){
    $news = News::all();
    $products = Product::all();
    $orders = Order::all();
    $totalProducts = count($products);
    $totalNews = count($news);
    $totalOrders = count($orders);;

    return view('admin.home.index', compact('news', 'products', 'totalProducts', 'totalNews', 'orders', 'totalOrders'));
}
    // thống kê order
    public function order(){
      //
    }
}
