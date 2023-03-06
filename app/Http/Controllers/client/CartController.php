<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {  
        $cartFarmApp = [];
        $carts=[];
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $cartFarmApp = json_decode($json, true);
          
            $idList = [];
            foreach ($cartFarmApp as $item) {
              $idList[] = $item['productId'];
            }
            if (count($idList) > 0) {
              $carts=product::whereIn('id',$idList)->get();
              for ($i=0; $i < count($carts) ; $i++) { 
                  if($cartFarmApp[$i]['productId']==$carts[$i]->id)
                   $carts[$i]->amount=$cartFarmApp[$i]['amount'];
              }
            } else {
              
            }
          }
        $data=[
          'carts'=>$carts
        ];
        return view('client.cart.index',$data);
    }
}
