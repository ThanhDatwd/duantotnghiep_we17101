<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\product;
use App\Models\category_group;
use App\Http\Requests\ProductCategoryRequest;



class ProductCategorysController extends Controller
{
    //
    public function index(){
        $categories=category::orderBy('id','desc')->paginate(5);
        if($key = request()->key){
            $categories=category::orderBy('id','desc')->where('category_name','like','%'.$key.'%')->paginate(5);
        }
        $data=[
            // "products"=>$products,
            "categories"=>$categories
        ];
        return view('admin.product_category.index',$data);
    }
    public function create(){
       
        $categories=category::all();
        $categroup=category_group::get();
        $data=[
            "categroup"=>$categroup,

            "categories"=>$categories,
        ];
        return view('admin.product_category.create',$data);
    }

    public function create_(ProductCategoryRequest $request){
      
        // $request->validate([
        //     'category_name' => ['required','min:3','max:20'],
        //     ]
        //  );
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['thumb' => $file_name]);
        
        $p = new category;
        $p->category_name=$_POST['category_name'];
        $p->thumb=$file_name;
        $p->is_active=$_POST['is_active'];
        $p->category_group_id=$_POST['category_group_id'];
        $p->stt=$_POST['stt'];
        $p->save();
        
        return redirect('/admin/product_category')->with('thongbao','Thêm thành công sản phẩm');
    }
    public function delete($id){
        $p = category::find($id);
        if($p==null) return redirect('/thongbao');
        $p->delete();
        
        return redirect('/admin/product_category');
    }

    public function trashed(){
        $categories = category::onlyTrashed()->get();
        return view('admin.product_category.trashed',['categories'=>$categories]);
    }
    public function restore($id){
        category::whereId($id)->restore();
        return back()->with('thongbao','Phục hồi thành công');
    }
    public function restoreAll(){
        category::onlyTrashed()->restore();
        return back()->with('thongbao','Phục hồi tất cả thành công');;
    }
    public function forceDelete($id){
        category::withTrashed()->find($id)->forceDelete();
        return back()->with('thongbao','Xóa thành công');
    }
    public function update($id){
        $p = category::find($id);
      
        $categroup=category_group::get();
        if($p==null) return redirect('/thongbao');
        return view('admin.product_category.update',['p'=>$p,'categroup'=>$categroup]);
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
        $p = category::find($id);
        if($p==null) return redirect('/thongbao');
        $p->category_name=$_POST['category_name'];
        $p->thumb=$file_name??$p->thumb;
        $p->category_group_id=$_POST['category_group_id'];
        $p->is_active=$_POST['is_active'];
        $p->save();
        return redirect('/admin/product_category')->with('thongbao','Cập nhật thành công sản phẩm');;
    }

}

