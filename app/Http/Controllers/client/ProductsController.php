<?php

namespace App\Http\Controllers\client;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\SendVerifyCodeMail;
use App\Models\category;
use App\Models\category_group;
use App\Models\coupon;
use App\Models\news;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{  
    protected $cartFarmApp=[];
    public function __construct()
    {
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $this->cartFarmApp = json_decode($json, true);
        }
    }
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
        $categoryGroups = category_group::all();
        $products = $category->products()->paginate(8);
        $data = [
            "category"=>$category,
            "categoryGroups"=>$categoryGroups,
            "products" => $products,
            "title"=> $category->category_name
        ];
        return view('client.products.index', $data);
    }
    public function group($slug)
    {
        $categoryGroups = category_group::with('categories.products')->get();
        $categoryGroup = category_group::with('categories.products')->where('slug', $slug)->first();
        $products = product::whereHas('category', function ($query) use ($slug) {
            $query->whereHas('category_group', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        })->paginate(8);
        // dd($products);
        
        $data = [
            "products" => $products,
            "categoryGroups"=>$categoryGroups,
            "title"=>$categoryGroup->name
        ];
        return view('client.products.index', $data);
    }
    public function group_all()
    {
        
        // $products = DB::table('products')->paginate(12);
        $categoryGroups = category_group::with('categories.products')->get();
        $products = Product::with('category.category_group')
            ->whereHas('category.category_group')
            ->paginate(8);
        $data = [
            "products" => $products,
            "categoryGroups"=>$categoryGroups,
            "title"=>"Tất cả sản phẩm"
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
        
        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                $this->cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $this->cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($this->cartFarmApp as $item) {
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
    public function buyNow(Request $request)
    {
        
        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                $this->cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $this->cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($this->cartFarmApp as $item) {
            if ($item['amount'] > 0) {
                $cart[] = [
                    'productId' => $item['productId'],
                    'amount'       => $item['amount']
                ];
            }
        }

        setcookie('cartFarmApp', json_encode($cart), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->route('clientpayment');
    }
    public function minusToCart(Request $request)
    {
        
        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                if( $this->cartFarmApp[$i]['amount']<=1){
                    unset($this->cartFarmApp[$i]);
                    break;
                }
                $this->cartFarmApp[$i]['amount'] -= $request->amount;
                break;
            }
        }
        setcookie('cartFarmApp', json_encode($this->cartFarmApp), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeToCart(Request $request)
    {
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                unset($this->cartFarmApp[$i]);
                break;
            }
        }
        setcookie('cartFarmApp', json_encode($this->cartFarmApp), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeAllCart(Request $request)
    {
       
        setcookie('cartFarmApp', json_encode([]), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function search(Request $request)
    {
        $products=product::where('name','like',$request->query('q'))->get();
        $data=[
            "products"=>$products,
            "q"=>$request->query('q')
        ];
        return view('client.search.index',$data);
    }
}



