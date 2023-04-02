<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\purchase_histories;
use App\Models\purchase_histories_detail;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{    
    public function history()
    {
        $purchase_histories=purchase_histories::all();
        $products=product::limit(8)->get();
        $data=[
           "products"=>$products,
           "purchase_histories"=>$purchase_histories
        ];
        return view('admin.purchase.history',$data);
    }
    public function show_import()
    {  
        $products=product::limit(8)->get();
        $data=[
            "products"=>$products
        ];
        return view('admin.purchase.index',$data);
    }
    public function purchase(Request $request)
    {    
        try {
            $data = json_encode($request->products);
            $arrayProduct = json_decode($data, true);
            $purchase_code=$request->purchase_code;
            $type=gettype($request->products);
            $purchase_history=new purchase_histories();
            $purchase_history->purchase_code=$request->purchase_code;
            $purchase_history->purchase_status=json_decode($request->purchase_status);
            $purchase_history->total_cost=$request->purchase_total;
            $purchase_history->save();
            foreach ($arrayProduct as $item) {
                $purchase_history_detail=new purchase_histories_detail();
                $purchase_history_detail->purchase_history_id=$purchase_history->id;
                $purchase_history_detail->product_id=$item['product_code'];
                $purchase_history_detail->quantity=$item['quantity'];
                $purchase_history_detail->cost=$item['price'];
                $purchase_history_detail->save();
                $product=product::find($item['product_code']);
                $product->price=$item['price'];
                $product->quantity_input=$item['quantity'];
                $product->save();
            }
            return response()->json(["message"=>"success"]);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"false"]);

        }

       
    }
}
