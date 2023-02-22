<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index(){
        return view('client.news.index');
    }
    public function newsDetail($slug)
    {
        dd($slug);
    }
}
