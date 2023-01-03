<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class HomeController extends Controller
{
    public function index()
    {
        $products=product::all();
        $data=[
            "products"=>$products
        ];
        return view('client.home.index',$data);
    }
    public function exam()
    {
        $products=product::all();
        $data=[
            "products"=>$products
        ];
        return view('client.home.index',$data);
    }
}
