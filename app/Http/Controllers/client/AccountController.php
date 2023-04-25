<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        return view('client.account.index');
    }
    public function myorder()
    {
        $myOrderList = order::where('email',Auth::guard('web')->user()->email)->orderBy('created_at','desc')->paginate(8);
        $data=[
            "myOrderList"=>$myOrderList
        ];
        return view('client.account.my_order.index',$data);
    }
    public function myorder_detail($code)
    {
        $myOrder = order::where('code',$code)->first();
        $order_detail = order_details::where('order_id',$myOrder->id)->get();
        $data=[
            'myOrder'=>$myOrder,
            'order__detail'=>$order_detail
        ];
        return view('client.account.my_order_detail.index',$data);
    }
}
