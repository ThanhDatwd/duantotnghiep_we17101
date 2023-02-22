<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Models\category_group;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;


class ProductsController extends Controller
{
    public function index(){
        // $products = DB::table('products')
        // ->leftJoin('categories', 'categories.id', '=', 'products.category_id')->get();
        $products=product::orderBy('id','desc')->paginate(50);
        // $categories=category::all();
        $data=[
            "products"=>$products,
            // "categories"=>$categories
        ];
        return view('admin.product.index',$data);
    }
    public function create(){
        $products=product::all();
        $brands = brand::all();
        $categories=category::all();
        $data=[
            "products"=>$products,
            "categories"=>$categories,
            "brands" => $brands
        ];
        return view('admin.product.create',$data);
    }
    public function create_(Request $request){

        $request->validate([
            'name' => ['required','min:3','max:20'],
            ]
         );

        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['thumb' => $file_name]);
        
        $p = new product;
        $p->name=$_POST['name'];
        $p->thumb=$file_name;
        $p->summary=$_POST['summary'];
        $p->content=$_POST['content'];
        $p->price=$_POST['price'];
        $p->discount=$_POST['discount'];
        $p->is_active=$_POST['is_active'];
        $p->price_current=$_POST['price_current'];
        $p->brand=$_POST['brand'];
        $p->unit=$_POST['unit'];
        $p->category_id=$_POST['category_id'];
        $p->save();
        
        return redirect('/admin/product')->with('thongbao','Thêm thành công sản phẩm');
    }
    public function delete($id){
        $p = product::find($id);
        if($p==null) return redirect('/thongbao');
        $p->delete();
        
        return redirect('/admin/product');
    }

    public function update($id){
        $p = product::find($id);
        $brands = DB::table('brands')->get();
        $categories=category::all();
        if($p==null) return redirect('/thongbao');
        return view('admin.product.update',['p'=>$p,'categories'=>$categories,'brands'=>$brands]);
    }
    public function update_(Request $request,$id){
        $file_name = null;
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['thumb' => $file_name]);
        $p = product::find($id);
        if($p==null) return redirect('/thongbao');
        $p->name=$_POST['name'];
        $p->thumb= $file_name??$p->thumb;
        $p->summary=$_POST['summary'];
        $p->discount=$_POST['discount'];
        $p->content=$_POST['content'];
        $p->price=$_POST['price'];
        $p->price_current=$_POST['price_current'];
        $p->brand=$_POST['brand'];
        $p->unit=$_POST['unit'];
        $p->is_active=$_POST['is_active'];
        $p->category_id=$_POST['category_id'];
        $p->save();
        return redirect('/admin/product')->with('thongbao','Cập nhật thành công sản phẩm');;
    }

}
