<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\category_news;
use App\Models\comment;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //
    public function index(Request $request){
        $query=news::query();
        $category_news=category_news::all();
        $cate=$request->get('group');
        
       if($cate){
          $query->where('category_news_id',$cate);
       }
        $news=$query->paginate(6);
        // dd($news);
        $data=[
            "news"=>$news,
            "category_news"=>$category_news
        ];
        return view('client.news.index',$data);
    }
    public function newsDetail($slug)
    {
       try {
        $post = news::where('slug', $slug)->firstOrFail();
        $newsRelate=news::where('category_news_id','=',$post->category_news_id)->where('id','<>',$post->id)->paginate(4);
        $category_news=category_news::all();
        $comments=comment::where('news_id',$post->id)->get();
        $data=[
            "post"=>$post,
            "newsRelate"=>$newsRelate,
            "category_news"=>$category_news,
            "comments"=>$comments
        ];
        return view('client.newsDetail.index',$data);
       } catch (\Throwable $th) {
         dd($th);
       }

    }
    public function comment(CommentRequest $request)
    {
       $comment=new comment();
       $comment->content=$request->content;
       $comment->news_id=$request->news_id;
       $comment->user_id=$request->user_id;
       $comment->save();
       return redirect()->back();
    }
}
