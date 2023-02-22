<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\product;


class ProductCategorysController extends Controller
{
    //
    public function index(){
        $categories=category::all();
        $data=[
            // "products"=>$products,
            "categories"=>$categories
        ];
        return view('admin.product_category.index',$data);
    }
    public function create(){
        
        $categories=category::all();
        $data=[
            "categories"=>$categories,
        ];
        return view('admin.product_category.create',$data);
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
        
        $p = new category;
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
        
        return redirect('/admin/product_category')->with('thongbao','Thêm thành công sản phẩm');
    }
    public function delete($id){
        $p = category::find($id);
        if($p==null) return redirect('/thongbao');
        $p->delete();
        
        return redirect('/admin/product_category');
    }

    public function update($id){
        $p = category::find($id);
        if($p==null) return redirect('/thongbao');
        return view('admin.product_category.update',['p'=>$p,'categories'=>$categories,'brands'=>$brands]);
    }
    public function update_(Request $request,$id){
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['thumb' => $file_name]);
        $p = category::find($id);
        if($p==null) return redirect('/thongbao');
        $p->name=$_POST['name'];
        $p->thumb=$file_name;
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
        return redirect('/admin/product_category')->with('thongbao','Cập nhật thành công sản phẩm');;
    }

}

