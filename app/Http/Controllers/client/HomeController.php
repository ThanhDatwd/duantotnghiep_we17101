<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_group;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

class HomeController extends Controller
{
    public function index()
    {
        $productsFlashSale=product::all()->where('discount','>',0);
        // $categoriesGroup=category_group::all()->where('is_hot',1)->with('categories')->where('');
        $categoriesGroup=category_group::with('categories')->with('products')->limit(2)->get();
        dd($categoriesGroup);

        $categories=category::all();
        $data=[
            "productsFlashSale"=>$productsFlashSale,
            "categoriesGroup"=>$categoriesGroup,
            "categories"=>$categories
        ];
        return view('client.home.index',$data);
    }
    public function exam()
    {
        $category=category::all();
        $category_group=category_group::with('categories')->distinct()->get();

        dd($category->products);
        // $pro=$category->products;
        // return json_encode($category->products);
        // dd($category_group);
        // $category->pruduct;
        // $category->images;
        $data=[
            // "products"=>$products,
            "cate"=>$category,
            "category_group"=>$category_group
        ];
        return view('client.exam',$data);

        // return Json($data);
        
    }
}
