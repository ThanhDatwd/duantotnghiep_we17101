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
use App\Http\Requests\CategoryGroupRequest;
class CategoryGroupController extends Controller
{
    //
    public function index(){
        $categroup=category_group::orderBy('id','desc')->paginate(5);
        $data=[
            "categroup"=>$categroup,
        ];
        return view('admin.category_group.index',$data);
    }
    public function create(){
               $categroup=category_group::all();
        $data=[
            "categroup"=>$categroup,
        ];
        return view('admin.category_group.create',$data);
    }

    public function create_(CategoryGroupRequest $request){
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'category_group'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
            $request->merge(['thumb' => $file_name]);
        }
        $file_poster=null;
        if($request->has('poster')){
            $file = $request->poster;
            $ext = $request->poster->extension();
            $file_poster = time().'-'.'category_group'. '.' .$ext;
            $file->move(public_path('upload'), $file_poster);
            $request->merge(['poster' => $file_poster]);
        }
        
        $p = new category_group;
        $p->name=$_POST['name'];
        $p->thumb=$file_name;
        $p->poster=$file_poster;
        $p->is_active=$_POST['is_active'];
        $p->stt=$_POST['stt']??'1';
        $p->save();
        
        return redirect('/admin/category_group')->with('thongbao','Thêm thành công sản phẩm');
    }
    public function delete($id){
        $p = category_group::find($id);
        if($p==null) return redirect('/thongbao');
        $p->delete();
        
        return redirect('/admin/category_group');
    }

    public function trashed(){
        $categories = category_group::onlyTrashed()->get();
        return view('admin.category_group.trashed',['categories'=>$categories]);
    }
    public function restore($id){
        category_group::whereId($id)->restore();
        return back()->with('thongbao','Phục hồi thành công');
    }
    public function restoreAll(){
        category_group::onlyTrashed()->restore();
        return back()->with('thongbao','Phục hồi tất cả thành công');;
    }
    public function forceDelete($id){
        category_group::withTrashed()->find($id)->forceDelete();
        return back()->with('thongbao','Xóa thành công');
    }
    public function update($id){
        $p = category_group::find($id);
      
       
        if($p==null) return redirect('/thongbao');
        return view('admin.category_group.update',['p'=>$p]);
    }
    public function update_(Request $request,$id){
        $p = category_group::find($id);
        if($p==null) return redirect('/thongbao');
        $file_name = null;
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'category_group'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
            $request->merge(['thumb' => $file_name]);
        }
        $file_poster=null;
        if($request->has('poster')){
            $file = $request->poster;
            $ext = $request->poster->extension();
            $file_poster = time().'-'.'category_group'. '.' .$ext;
            $file->move(public_path('upload'), $file_poster);
            $request->merge(['poster' => $file_poster]);
        }
      
        $p->name=$_POST['name'];
        $p->thumb=$file_name??$p->thumb;
        $p->poster=$file_poster??$p->poster;
        $p->is_active=$_POST['is_active'];
        $p->save();
        return redirect('/admin/category_group')->with('thongbao','Cập nhật thành công sản phẩm');;
    }

}

