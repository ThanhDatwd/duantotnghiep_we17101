<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use App\Http\Requests\BrandRequest;



class BrandController extends Controller
{
    public function index(){
        $brands=brand::orderBy('id','desc')->paginate(5);
        if($key = request()->key){
            $brands=brand::orderBy('id','desc')->where('brands','like','%'.$key.'%')->paginate(5);
        }
        $data=[
            "brands"=>$brands,
        ];
        return view('admin.brand.index',$data);
    }
    public function create(){
        $brands = brand::all();
        $data=[
            "brands" => $brands
        ];
        return view('admin.brand.create',$data);
    }
    public function create_(BrandRequest $request){
        if($request->has('avatar')){
            $file = $request->avatar;
            $ext = $request->avatar->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['avatar' => $file_name]);
        
        $b = new brand;
        $b->brands=$_POST['brands'];
        $b->avatar=$file_name;
        $b->address=$_POST['address'];
        // $b->importer=$_POST['importer'];
        $b->email=$_POST['email'];
        $b->phone=$_POST['phone'];
   
        $b->save();
        
        return redirect('/admin/brand')->with('thongbao','Thêm thành công nguồn nhập hàng');
    }
    public function delete($id){
        $b = brand::find($id);
        if($b==null) return redirect('/thongbao');
        $b->delete();
        return redirect('/admin/brand');
    }

    public function trashed(){
        $brands = brand::onlyTrashed()->get();
        return view('admin.brand.trashed',['brands'=>$brands]);
    }
    public function restore($id){
        brand::whereId($id)->restore();
        return back()->with('thongbao','Phục hồi thành công');;
    }
    public function restoreAll(){
        brand::onlyTrashed()->restore();
        return back()->with('thongbao','Phục hồi tất cả thành công');;
    }
    public function forceDelete($id){
        brand::withTrashed()->find($id)->forceDelete();
        return back();
    }

    public function update($id){
        $b = brand::find($id);
        if($b==null) return redirect('/thongbao');
        return view('admin.brand.update',['b'=>$b]);
    }
    public function update_(Request $request,$id){
        $file_name = null;
        if($request->has('avatar')){
            $file = $request->avatar;
            $ext = $request->avatar->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
        $request->merge(['avatar' => $file_name]);
        $b = brand::find($id);
        if($b==null) return redirect('/thongbao');
        $b->brands=$_POST['brands'];
        $b->avatar=$file_name??$b->avatar   ;
        $b->address=$_POST['address'];
        // $b->importer=$_POST['importer'];
        $b->email=$_POST['email'];
        $b->phone=$_POST['phone'];
        $b->save();
        return redirect('/admin/brand')->with('thongbao','Cập nhật thành công nguồn nhập hàng');;
    }

    
}
