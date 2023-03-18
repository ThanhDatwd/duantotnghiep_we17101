<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category_news;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// str_slug

    


class CategoriesNews extends Controller
{
    public function index()
{
    $categories_news = category_news::paginate(5);

    return view('admin.categories_news.index', compact('categories_news'));
}

   public  function them1(Request $request){

 
     
  
    $t= new category_news;
    $t->name = $_POST['name'];
    //slug
    $t->slug = Str::slug($request->input('name'));
  
   
   
    
    


    $t->save();

    return redirect('/admin/categories_news');


}
function them(){
    return view('admin.categories_news.them');
}
function capnhat($id){

    $t = category_news::find($id);
    return view('admin.categories_news.capnhat', compact('t'));
  
}
function capnhat_($id){
    $t= category_news::find($id);
    $t->name = $_POST['name'];
    //save
    $t->save();
    return redirect('/admin/categories_news');

}
public function xoa($id)
{
    // Tìm bản ghi có ID tương ứng
    $t = category_news::find($id);

    // Kiểm tra nếu không tìm thấy bản ghi thì trả về 404
    if (!$t) {
        abort(404);
    }

    // Thực hiện xóa mềm bằng cách thiết lập giá trị deleted_at cho bản ghi
    $t->delete();

    // Chuyển hướng trang về danh sách tin tức
    return redirect('/admin/categories_news');
}

//xoá nhiều select
public function deleteMany(Request $request)
{
    $ids = $request->input('check');
    category_news::whereIn('id', $ids)->delete();

    return redirect()->back()->with('message', 'Đã xoá thành công ' . count($ids) . ' bài viết');
}
// phục hồi
public function restore($id)
{
    $categories_news = category_news::onlyTrashed()->find($id);
    $categories_news->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công');
}
// phục hồi nhiều
public function restoreMany(Request $request)
{
    $ids = $request->input('check');
    category_news::onlyTrashed()->whereIn('id', $ids)->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công ' . count($ids) . ' bài viết');
}
//phục hồi tất cả
public function restoreAll()
{
    category_news::onlyTrashed()->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công tất cả bài viết');

}
// trang thùng rác
public function trash()
{
    $categories_news = category_news::onlyTrashed()->paginate(5);

    return view('admin.categories_news.trash', compact('categories_news'));
}
}
    