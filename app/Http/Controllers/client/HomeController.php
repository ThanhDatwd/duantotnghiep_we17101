<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_group;
use App\Models\news;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use NumberFormatter;

class HomeController extends Controller
{
    public function index()
    {   
        $productsFlashSale=product::all()->where('discount','>',0);
        $categoriesGroup=category_group::with('categories.products')->where('is_hot',1)->limit(3)->get();
        foreach ($categoriesGroup as $group) {
            foreach ($group->categories as $category) {
                $category->products = $category->products()->take(2)->get();
            }
        }
        $news=news::limit(5)->get();
       $categories=category::limit(3)->get();
        $data=[
            "productsFlashSale"=>$productsFlashSale,
            "categoriesGroup"=>$categoriesGroup,
            "categories"=>$categories,
            "news"=>$news,
        ];
        return view('client.home.index',$data);
    }
    public function exam()
    {
        $category=category::all();
        $category_group=category_group::limit(3)->get();

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
