<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use App\Models\product;
use App\Http\Requests\CouponRequest;



class CoupouController extends Controller
{
    //
    public function index(){
        $coupons=coupon::paginate(5);
        if($key = request()->key){
            $coupons=coupon::orderBy('id','desc')->where('coupon_code','like','%'.$key.'%')->paginate(5);
        }
        $data=[
            "coupons"=>$coupons
        ];
        return view('admin.coupon.index',$data);
    }
    public function create(){
      
        $coupons=coupon::all();
        $data=[
            "coupons"=>$coupons,
        ];
        
        return view('admin.coupon.create',$data);
    }

    public function create_(CouponRequest $request){
        $c = new coupon;
        $c->coupon_code=$_POST['coupon_code'];
        $c->coupon_type=$_POST['coupon_type'];
        $c->description=$_POST['description'];
        $c->discount=$_POST['discount'];
        $c->min_condition=$_POST['min_condition'];
        $c->limit_used=$_POST['limit_used'];
        $c->is_active=$_POST['is_active'];
        $c->start_date=$_POST['start_date'];
        $c->end_date=$_POST['end_date'];
        // using gte()
//         dd($c->start_date);
// if ($c->start_date->gte($c->end_date)) { 
//     dd( ' is greater than or equal to ' );
// } else {
//     dd(  ' is not greater than or equal to ' );
// }

        $c->save();
        
        return redirect('/admin/coupon')->with('thongbao','Thêm thành công mã giảm giá');
    }
    public function delete($id){
        $c = coupon::find($id);
        if($c==null) return redirect('/thongbao');
        $c->delete();
        
        return redirect('/admin/coupon');
    }

    public function trashed(){
        $coupons = coupon::onlyTrashed()->get();
        return view('admin.coupon.trashed',['coupons'=>$coupons]);
    }
    public function restore($id){
        coupon::whereId($id)->restore();
        return back()->with('thongbao','Phục hồi thành công');
    }
    public function restoreAll(){
        coupon::onlyTrashed()->restore();
        return back()->with('thongbao','Phục hồi tất cả thành công');;
    }
    public function forceDelete($id){
        coupon::withTrashed()->find($id)->forceDelete();
        return back()->with('thongbao','xóa thành công');
    }
    public function update($id){
        $c = coupon::find($id);
        if($c==null) return redirect('/thongbao');
        return view('admin.coupon.update',['c'=>$c,]);
    }
    public function update_(Request $request,$id){
        $c = coupon::find($id);
        if($c==null) return redirect('/thongbao');
        $c->coupon_code=$_POST['coupon_code'];
        $c->coupon_type=$_POST['coupon_type'];
        $c->description=$_POST['description'];
        $c->discount=$_POST['discount'];
        $c->min_condition=$_POST['min_condition'];
        $c->limit_used=$_POST['limit_used'];
        $c->is_active=$_POST['is_active'];
        $c->start_date=$_POST['start_date'];
        $c->end_date=$_POST['end_date'];
        $c->save();
        return redirect('/admin/coupon')->with('thongbao','Cập nhật thành công mã giảm giá');;
    }

}
