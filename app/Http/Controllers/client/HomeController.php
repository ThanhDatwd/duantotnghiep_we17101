<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_group;
use Illuminate\Http\Request;
use App\Models\product;
use Nette\Utils\Json;

class HomeController extends Controller
{
    public function index()
    {
        $products=product::all();
        $category=category::get();
        $data=[
            "products"=>$products,
            "cate"=>$category
        ];
        return view('client.home.index',$data);
    }
    public function exam()
    {
        
        $products=product::all();
        $category=category::with('products')->distinct()->get();
        $category_group=category_group::with('categories')->distinct()->get();

        // dd($category->products);
        // $pro=$category->products;
        // return json_encode($category->products);
        // dd($category_group);
        $data=[
            "products"=>$products,
            "cate"=>$category,
            "category_group"=>$category_group
        ];
        return view('client.exam',$data);
    }
}
