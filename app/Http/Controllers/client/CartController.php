<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function cart()
  {
    $cartFarmApp = [];
    $carts = [];
    $total = 0;
    $couponMsg = "";
    if (isset($_COOKIE["cartFarmApp"])) {
      $json = $_COOKIE["cartFarmApp"];
      $cartFarmApp = json_decode($json, true);

      $idList = [];
      foreach ($cartFarmApp as $item) {
        $idList[] = $item['productId'];
      }
      if (count($idList) > 0) {
        $carts = product::whereIn('id', $idList)->get();
        for ($i = 0; $i < count($carts); $i++) {
          if ($cartFarmApp[$i]['productId'] == $carts[$i]->id)
            $carts[$i]->amount = $cartFarmApp[$i]['amount'];
          $total += ($carts[$i]->price_current - ($carts[$i]->price_current * $carts[$i]->discount / 100))* $cartFarmApp[$i]['amount'];
        }
      } else {
      }
    }
    if (isset($_COOKIE["couponCode"])) {
      $coupon = coupon::where('coupon_code', $_COOKIE["couponCode"])->first();
      $couponCode = $_COOKIE["couponCode"];
      if ($coupon != null) {
        if ($total >= $coupon->min_condition) {
          $couponMsg = "Mã khuyến mãi đã được áp dụng";
          if ($coupon->coupon_type == 1) {
            $total = $total - $coupon->discount;
          } elseif ($coupon->coupon_type == 2) {
            $total = $total - (($total * $coupon->discount) / 100);
          } elseif ($coupon->coupon_type == 3) {
          }
        } else {
          $couponMsg = "Đơn hàng không đủ điều kiện đế sử dụng mã khuyễn mãi này";
        }
      } else {
        $couponMsg = "Mã khuyến mãi không còn tồn tại";
      }
    } else {
      $couponMsg = "";
    }
    $coupons = coupon::all();
    $data = [
      'carts' => $carts,
      'total' => $total,
      'couponMsg' => $couponMsg,
      "coupons" => json_encode($coupons),
    ];
    return view('client.cart.index', $data);
  }
}
