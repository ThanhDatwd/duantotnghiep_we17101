<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\comment;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //
    public function index(){
        $news=news::paginate(6);
        $data=[
            "news"=>$news
        ];
        return view('client.news.index',$data);
    }
    public function newsDetail($slug)
    {
        // $post = news::where('slug', $slug)->firstOrFail();
        // $data=[
        //     "post"=>$post
        // ];
        return view('client.newsDetail.index');

    }
    public function comment(CommentRequest $request)
    {
       $comment=new comment();
       $comment->content=$request->content;
       $comment->news_id=$request->news_id;
       $comment->user_id=Auth::guard('web')->user()->id??1;
       return redirect()->back();
    }
}
