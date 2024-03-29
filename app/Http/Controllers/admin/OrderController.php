<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_details;
use App\Models\order;

class OrderController extends Controller
{
    //
    public function index(){
        $order = order::paginate(5);
        return view('admin.order.index',['order'=>$order]);
    }
    public function detail($id){
        $order_detail = order_details::find($id);
        $order = order::find($id);
        return view('admin.order.detail',['order_detail'=>$order_detail,'order'=>$order]);
    }
}
