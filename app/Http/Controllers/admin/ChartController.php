<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model product
use App\Models\product;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.chart.index', compact('products'));
    }
    //bar chart
    
}
