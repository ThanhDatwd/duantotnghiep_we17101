<?php

namespace App\Http\Controllers\client;

use App\Models\news;
use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function newsDetail($id)
    {
        $post = news::where('slug', $slug)->firstOrFail();
        $data=[
            "post"=>$post
        ];
        return view('client.newsDetail.index');

    }
}
