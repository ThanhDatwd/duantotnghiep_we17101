<?php

namespace App\Http\Controllers\client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\coupon;
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
    public function productDetail($slug)
    {   
        $currentDate=getdate();
        $product=product::where('slug',$slug)->first();
        $coupons=coupon::where('user_used','<','limit_used')
                        ->whereDate('start_date','>',$currentDate)
                        ->whereDate('end_date','>',$currentDate)
                        ->orderBy('created_at');
        $data=[
          "product"=>$product,
          "coupons"=>json_encode($coupons)
          
        ];
        return view('client.productDetail.index',$data);
    }
}
