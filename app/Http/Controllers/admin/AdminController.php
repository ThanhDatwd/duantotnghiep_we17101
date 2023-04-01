<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\news;
// đơn hàng
use App\Models\order;
use App\Models\User;
// khách hàng
use App\Models\customer;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
  $selling_products = Product::orderBy('quantity_output', 'desc')->take(8)->get();

    return view('admin.home.index', compact('news', 'products', 'orders', 'users', 'totalProducts', 'totalNews', 'totalOrders', 'totalUsers', 'neworders', 'selling_products',));
}
    // tài khoản đang đăng nhập
   //logout
 public function logout(){
  
    Auth::guard('admin')->logout();
    return redirect()->route('siteshow-login')->with('message', 'Đăng xuất thành công');
 }
        
public function profile(){
  $users = Auth::guard('admin')->user();
     $username = Auth::guard('admin')->user()->email;
     $news = DB::select('SELECT * FROM news WHERE created_by = :created_by', ['created_by' => $username]);
    
$count_news = DB::table('news')
                ->where('created_by', $username)
                ->count();     
return view('admin.profile.index', compact('users', 'news', 'count_news'));
}

}

