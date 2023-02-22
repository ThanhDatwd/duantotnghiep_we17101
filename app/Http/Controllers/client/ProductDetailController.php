<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetail($slug)
    {
        return view('client.productDetail.index');
    }
}
