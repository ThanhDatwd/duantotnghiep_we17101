<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\category_group;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;


class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->orderBy('id','desc')->get();
        // ->leftJoin('categories', 'categories.id', '=', 'products.category_id')->get();
        // $products=product::all();
        $categories=category::all();
        $data=[
            "products"=>$products,
            "categories"=>$categories
        ];
        return view('admin.product.index',$data);
    }
    // public function index(){
    //     $adproduct = product::paginate(5);
    //     return view('admin.product.index',compact('adproduct'))->with('i',(request()->input('page',1)-1)*5);
    // }
    // public function create(){
    //     return view('admin.product.create');
    // }
    // public function store(Request $request){
    //     product::create($request->all());
    //     return redirect()->route('admin.product.index')->with('thongbao','Thêm sinh viên thành công');
    // }
    public function create(){
        return view('admin.product.create');
    }
    public function create_(){
      
        $p = new product;
        $p->name=$_POST['name'];
        $p->thumb=$_POST['thumb'];
        $p->summary=$_POST['summary'];
        $p->content=$_POST['content'];
        $p->price=$_POST['price'];
        $p->price_format=$_POST['price_format'];
        $p->brand=$_POST['brand'];
        $p->unit=$_POST['unit'];
        $p->category_id=$_POST['category_id'];
        $p->save();
        
        return redirect('/admin/product'); 
    }
    public function delete($id){
        $p = product::find($id);
        if($p==null) return redirect('/thongbao');
        $p->delete();
        return redirect('/admin/product');
    }

    public function update($id){
        $p = product::find($id);
        if($p==null) return redirect('/thongbao');
        return view('admin.product.update');
    }
    public function update_($id){
        $p = product::find($id);
        if($p==null) return redirect('/thongbao');
        $p->name=$_POST['name'];
        $p->thumb=$_POST['thumb'];
        $p->summary=$_POST['summary'];
        $p->content=$_POST['content'];
        $p->price=$_POST['price'];
        $p->price_format=$_POST['price_format'];
        $p->brand=$_POST['brand'];
        $p->unit=$_POST['unit'];
        $p->category_id=$_POST['category_id'];
        $p->save();
        return redirect('/admin/product');
    }

}
