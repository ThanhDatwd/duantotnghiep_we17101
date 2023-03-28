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
  $newproducts = Product::orderBy('created_at', 'desc')->take(5)->get();

  $total = Order::select(DB::raw('sum(total) as total'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('total');
    
    $months = Order::select(DB::raw('Month(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
          
            ->pluck('month');
    
    $datas = array(0, 0, 0, 0, 0, 0, 0);
    foreach ($months as $index => $month) {
        $datas[$month] = $total[$index];
    }
    $label1 = $months;

     


        

    


    

   

    return view('admin.home.index', compact('news', 'products', 'orders', 'users', 'totalProducts', 'totalNews', 'totalOrders', 'totalUsers', 'neworders', 'newproducts', 'months', 'datas','label1'));
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

