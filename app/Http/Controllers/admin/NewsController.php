<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class NewsController extends Controller
{
    public function index()
{
    $news = News::join('categories_news', 'news.category_news_id', '=', 'categories_news.id')
        ->select('news.*', 'categories_news.name as category_name')
        ->whereNull('news.deleted_at')
        ->paginate(5);

    return view('admin.news.index', compact('news'));
}

   public  function them1(NewsRequest $request){

 
        $file_name = null;
        if($request->has('thumb')){
            $file = $request->thumb;
            $ext = $request->thumb->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
    $request->merge(['thumb' => $file_name]);
    $t= new news;
    $t->title = $_POST['title'];
    $t->summary = $_POST['summary'];
   
    $t->thumb = $file_name;
    
    $t->content= $_POST['content'];
    $t->category_news_id = $_POST['category_news_id'];
    //slug
     $t->slug = Str::slug($request->input('title'));
     //created_by
    $t->created_by = Auth::guard('admin')->user()->username;
    $t->updated_by = Auth::guard('admin')->user()->username;
    
    


    $t->save();

    return redirect('/admin/news')->with('message', 'Đã thêm thành công');


}
function them(){
    return view('admin.news.them');
}
function capnhat($id){

    $news = news::find($id);
    
    return view('admin.news.capnhat',['t'=>$news]);
  
}
function capnhat_(Request $request,$id){
    
    
    $t= news::find($id);
    $t->title = $_POST['title'];
    $t->summary = $_POST['summary'];
   
    
    $t->category_news_id = $_POST['category_news_id'];
   
        $t->slug = Str::slug($request->input('title'));
    //upload file
    if($request->has('thumb')){
        $file = $request->thumb;
        $ext = $request->thumb->extension();
        $file_name = time().'-'.'news'. '.' .$ext;
        $file->move(public_path('upload'), $file_name);
        $t->thumb = $file_name;
    }
    $t->content= $_POST['content'];

    
    //save
    $t->save();
    return redirect('/admin/news');

}
public function xoa($id)
{
    // Tìm bản ghi có ID tương ứng
    $t = news::find($id);

    // Kiểm tra nếu không tìm thấy bản ghi thì trả về 404
    if (!$t) {
        abort(404);
    }

    // Thực hiện xóa mềm bằng cách thiết lập giá trị deleted_at cho bản ghi
    $t->delete();

    // Chuyển hướng trang về danh sách tin tức
    return redirect('/admin/news');
}

//xoá nhiều select
public function deleteMany(Request $request)
{
    $ids = $request->input('check');
    news::whereIn('id', $ids)->delete();

    return redirect()->back()->with('message', 'Đã xoá thành công ' . count($ids) . ' bài viết');
}
// phục hồi
public function restore($id)
{
    $news = news::onlyTrashed()->find($id);
    $news->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công');
}
// phục hồi nhiều
public function restoreMany(Request $request)
{
    $ids = $request->input('check');
    news::onlyTrashed()->whereIn('id', $ids)->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công ' . count($ids) . ' bài viết');
}
//phục hồi tất cả
public function restoreAll()
{
    news::onlyTrashed()->restore();

    return redirect()->back()->with('message', 'Đã phục hồi thành công tất cả bài viết');

}
// trang thùng rác
public function trash()
{
    $news = news::onlyTrashed()->paginate(5);

    return view('admin.news.trash', compact('news'));
}
}
    