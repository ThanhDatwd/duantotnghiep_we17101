<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
    public function index(){
        $news = news::all();
        return view('admin.news.index',compact('news'));
    }
}
