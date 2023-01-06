<?php

namespace App\Http\Controllers\client;
use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(12);
        // dd($products);
        $data=[
            "products"=>$products
        ];
        return view('client.products.index',$data);
    }
}
