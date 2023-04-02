<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function applyCouponCode(Request $request )
    {   
        try {
             $coupon=coupon::where('coupon_code',$request->code)->first();
             if($coupon!=null){
                 return response()->json(["coupon"=>$coupon,"messages"=>"success"],200);
             }
             else{
                return response()->json(["coupon"=>$coupon,"messages"=>"fall"],200);

             }
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
    public function useCouponCode(Request $request )
    {   
        try {
            setcookie("couponCode", $request->couponCode, time() + 3 * 24 * 60 * 60, '/');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
}
