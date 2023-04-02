<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_details;
use App\Models\order;
use DB;
class OrderController extends Controller
{
    //
    public function index(){
        $order = order::all();  
        return view('admin.order.index',['order'=>$order]);
    }
    public function detail($id){
        $order_detail = order_details::all();
        $order = order::find($id);
    
        
        return view('admin.order.detail',['order_detail'=>$order_detail,'order'=>$order]);
    }
    public function update(Request $request,$id){
        $order= order::find($id);
        $order_detail = order_details::find($id);
       
        if($order==null) return redirect('/thongbao');
        $order->status=$_POST['status'];
      
        $order->save();
        return redirect('/admin/order')->with('thongbao','Cập nhật thành công đơn hàng');;
    }
}
