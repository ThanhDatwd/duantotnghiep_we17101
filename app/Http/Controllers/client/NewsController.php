<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

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
        $post = news::where('slug', $slug)->firstOrFail();
        $data=[
            "post"=>$post
        ];
        return view('client.newsDetail.index');

    }
}
