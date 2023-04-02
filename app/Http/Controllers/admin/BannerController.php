<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//model banner
use App\Models\Banner;

class BannerController extends Controller
{
   public function index()
{
    $banner = Banner::paginate(5);
    return view('admin.banner.index', compact('banner'));
}

   public  function them1(Request $request){

 
        $file_name = null;
        if($request->has('url')){
            $file = $request->url;
            $ext = $request->url->extension();
            $file_name = time().'-'.'banners'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
    $request->merge(['thumb' => $file_name]);
    $t= new banner;
    $t->url = $file_name;
    
    


    $t->save();

    return redirect('/admin/banner')->with('message', 'Đã thêm thành công');


}
function them(){
    return view('admin.banner.them');
}
function capnhat($id){

    $banner = banner::find($id);
    
    return view('admin.banner.capnhat',['t'=>$banner]);
  
}
function capnhat_(Request $request,$id){
    
    
    $t= banner::find($id);
  
    //upload file
    if($request->has('url')){
        $file = $request->thumb;
        $ext = $request->thumb->extension();
        $file_name = time().'-'.'banner'. '.' .$ext;
        $file->move(public_path('upload'), $file_name);
        $t->url = $file_name;
    }

    
    //save
    $t->save();
    return redirect('/admin/banner');

}
public function xoa($id)
{
    // Tìm bản ghi có ID tương ứng
    $t = banner::find($id);

    // Kiểm tra nếu không tìm thấy bản ghi thì trả về 404
    if (!$t) {
        abort(404);
    }

    // Thực hiện xóa mềm bằng cách thiết lập giá trị deleted_at cho bản ghi
    $t->delete();

    // Chuyển hướng trang về danh sách tin tức
    return redirect('/admin/banner');
}

//xoá nhiều select
public function deleteMany(Request $request)
{
    $ids = $request->input('check');
    banner::whereIn('id', $ids)->delete();

    return redirect()->back()->with('message', 'Đã xoá thành công ' . count($ids) . ' bài viết');
}
// phục hồi
public function restore($id)
{
    $banner = banner::onlyTrashed()->find($id);
    $banner->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công');
}
// phục hồi nhiều
public function restoreMany(Request $request)
{
    $ids = $request->input('check');
    banner::onlyTrashed()->whereIn('id', $ids)->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công ' . count($ids) . ' bài viết');
}
//phục hồi tất cả
public function restoreAll()
{
    banner::onlyTrashed()->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công tất cả bài viết');

}
// trang thùng rác
public function trash()
{
    $banner = banner::onlyTrashed()->paginate(5);

    return view('admin.banner.trash', compact('banner'));
}
}
    
