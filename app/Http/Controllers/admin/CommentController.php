<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index(){
        $comment = DB::table('comments') ->paginate(5);
        return view('admin.comment.index', compact('comment'));
    }   
    //xóa
    public function xoa($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/admin/comment')->with('message', 'Đã xóa thành công');
    }
}
