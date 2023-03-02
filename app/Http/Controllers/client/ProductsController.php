<?php

namespace App\Http\Controllers\client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_group;
use App\Models\coupon;
use Illuminate\Http\Request;
use App\Models\product;

class ProductsController extends Controller
{
    // public function index()
    // {
    //     $products = DB::table('products')->paginate(12);
    //     $categoriesGroup=category_group::with('categories.products')->where('is_hot',1)->limit(3)->get();
    //     $data=[
    //         "products"=>$products
    //     ];
    //     return view('client.products.index',$data);
    // }
    public function category($slug)
    {  
        $category=category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->paginate(8);
        $data=[
            "products"=>$products
        ];
        return view('client.products.index',$data);
    }
    public function group($slug)
    {
        // $products = DB::table('products')->paginate(12);
        $categoriesGroup=category_group::with('categories.products')->where('slug',$slug)->first();
        $products = Product::with('category.category_group')
        ->whereHas('category.category_group', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->paginate(8);
        $data=[
            "products"=>$products,
            "categories_group"=>$categoriesGroup
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
    // public function addToCart($id)
    // {
    //     $product = product::findOrFail($id);
 
    //     $cart = session()->get('cart', []);
 
    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     }  else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "thumb" => $product->thumb,
    //             "price" => $product->price,
    //             "quantity" => 1
    //         ];
    //     }
 
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product add to cart successfully!');
    // }
    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart successfully updated!');
    //     }
    // }
 
    // public function remove(Request $request)
    // {
    //     if($request->id) {
    //         $cart = session()->get('cart');
    //         if(isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'Product successfully removed!');
    //     }
    // }
}
