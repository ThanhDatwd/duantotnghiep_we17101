<?php

namespace App\Http\Controllers\client;

use App\Models\news;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index()
    {
        return view('client.news.index');
    }
    public function newsDetail($id)
    {
        $news = news::first();
       
        $data = [
            'news' => $news
        ];
        return view('client.newsDetail.index', $data);
    }
}
