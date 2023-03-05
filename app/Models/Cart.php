<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    // public $products = 0;
    // public $total_price =0;
    // public $total_quantity =0;

    // public function __constant($cart){
    //     if($cart){
    //         $this->products=$cart->products; 
    //         $this->total_price=$cart->total_price;
    //         $this->total_quantity=$cart->total_quantity;
    //     }
    // }
    // public function AddCart($product,$id){
    //     $newProduct = ['quantity'=>0,'price'=>$product->price,'productInfo'=>$product];
    //     if($this->products){
    //         if(array_key_exists($id,$products)){
    //             $newProduct = $products[$id];
    //         }
    //     }
    //     $newProduct['quantity']++;
    //     $newProduct['price'] = $newProduct['quantity'] * $product->price;
    //     $this->products[$id] = $newProduct;
    //     $this->total_price += $product->price;
    //     $this->total_quantity++;
    // }
}
