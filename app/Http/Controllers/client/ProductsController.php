<?php

namespace App\Http\Controllers\client;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_group;
use App\Models\coupon;
use App\Models\news;
use Illuminate\Http\Request;
use App\Models\product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(12);
        $categoriesGroup=category_group::with('categories.products')->where('is_hot',1)->limit(3)->get();
        $data=[
            "products"=>$products
        ];
        return view('client.products.index',$data);
    }
    public function category($slug)
    {   
        $category = category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->paginate(8);
        $data = [
            "products" => $products
        ];
        return view('client.products.index', $data);
    }
    public function group($slug)
    {
        // $products = DB::table('products')->paginate(12);
        $categoriesGroup = category_group::with('categories.products')->where('slug', $slug)->first();
        $products = Product::with('category.category_group')
            ->whereHas('category.category_group', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->paginate(8);
        $data = [
            "products" => $products,
            "categories_group" => $categoriesGroup
        ];
        return view('client.products.index', $data);
    }
    public function group_all($slug)
    {
        // $products = DB::table('products')->paginate(12);
        $categoriesGroup = category_group::with('categories.products')->get();
        $products = Product::with('category.category_group')
            ->whereHas('category.category_group', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->paginate(8);
        $data = [
            "products" => $products,
            "categories_group" => $categoriesGroup
        ];
        return view('client.products.index', $data);
    }
    public function productDetail($slug)
    {

        $currentDate = getdate();
        $product = product::where('slug', $slug)->firstOrFail();
        $product_relate=product::where('category_id', $product->category_id)->get();
        // $coupons = coupon::where('user_used', '<', 'limit_used')
        //     // ->whereDate('start_date', '>=', $currentDate)
        //     // ->whereDate('end_date', '>', $currentDate)
        //     // ->orderBy('created_at')
        //     ->get();
        $coupons=coupon::all();
        $data = [
            "product" => $product,
            "coupons" => json_encode($coupons),
            "product_relate"=>$product_relate

        ];
        return view('client.productDetail.index', $data);
    }
    public function addToCart(Request $request)
    {
        $cartFarmApp = [];
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $cartFarmApp = json_decode($json, true);
        }
        $isFind = false;
        for ($i = 0; $i < count($cartFarmApp); $i++) {
            if ($cartFarmApp[$i]['productId'] == $request->productId) {
                $cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($cartFarmApp as $item) {
            if ($item['amount'] > 0) {
                $cart[] = [
                    'productId' => $item['productId'],
                    'amount'       => $item['amount']
                ];
            }
        }

        setcookie('cartFarmApp', json_encode($cart), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeToCart(Request $request)
    {
        $cartFarmApp = [];
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $cartFarmApp = json_decode($json, true);
        }
        $isFind = false;
        for ($i = 0; $i < count($cartFarmApp); $i++) {
            if ($cartFarmApp[$i]['productId'] == $request->productId) {
                $cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($cartFarmApp as $item) {
            if ($item['amount'] > 0) {
                $cart[] = [
                    'productId' => $item['productId'],
                    'amount'       => $item['amount']
                ];
            }
        }

        setcookie('cartFarmApp', json_encode($cart), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeAllCart(Request $request)
    {
       
        setcookie('cartFarmApp', json_encode([]), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
}



