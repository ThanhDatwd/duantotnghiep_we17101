<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\news;
// đơn hàng
use App\Models\order;
use App\Models\user;
// khách hàng
use App\Models\customer;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
public function index(){
    $news = News::all();
    $products = Product::all();
    $orders = Order::all();
    $users = User::all();
    $totalProducts = count($products);
    $totalNews = count($news);
    $totalOrders = count($orders);
    $totalUsers= count($users);
    
    //thống kê 5 đơn hàng mới nhất
  
     
  $neworders = Order::orderBy('created_at', 'desc')->take(5)->get();
    $newproducts = Product::orderBy('created_at', 'desc')->take(5)->get();
    $quantity_output= product::select(DB::raw('sum(quantity_output) as quantity_output'))
     ->whereBetween('created_at', [now()->subDays(7), now()])
     ->groupBy(DB::raw('Day(created_at)'))
     ->pluck('quantity_output');
     $months = product::select(DB::raw('Day(created_at) as month'))
     ->whereBetween('created_at', [now()->subDays(7), now()])
     ->groupBy(DB::raw('Day(created_at)'))
     ->pluck('month');
     $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
     foreach($months as $index => $month){
         $datas[$month] = $quantity_output[$index];
     }
         $products = DB::table('products')
                ->orderByDesc('quantity_output')
                ->take(5)
                ->get();

    $label2 = $products->pluck('name');
    $data2 = $products->pluck('quantity_output');
    


    

   

    return view('admin.home.index', compact('news', 'products', 'totalProducts', 'totalNews', 'orders', 'totalOrders', 'newproducts', 'neworders', 'datas','data2','label2','totalUsers'));
}
    // tài khoản đang đăng nhập
   
        

}

