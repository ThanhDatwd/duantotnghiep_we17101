<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminUserController extends Controller
{
    //
    public function index(){
        $users = DB::table('administrators')->paginate(5);
        return view('admin.admin_users.index', compact('users'));
       
    } 
    
    public  function them1(Request $request){

 
        $file_name = null;
        if($request->has('avatar')){
            $file = $request->avatar;
            $ext = $request->avatar->extension();
            $file_name = time().'-'.'admin_users'. '.' .$ext;   
            $file->move(public_path('upload'), $file_name);
        }
    $request->merge(['avatar' => $file_name]);
    $t= new Admin();
    $t->last_name = $_POST['last_name'];
    $t->first_name = $_POST['first_name'];
    $t->username = $_POST['username'];
    $t->password = bcrypt($_POST['password']);
    $t->full_name = $_POST['first_name'].$_POST['last_name'];
    $t->gender=  $_POST['gender'];
    $t->phone = $_POST['phone'];
    //role_id
    $t->address = $_POST['address'];
    //province
    $t->province = $_POST['province'];
    //district
    $t->district = $_POST['district'];
    //ward
    $t->ward = $_POST['ward'];

     $t->birthday = $_POST['birthday'];
    $t->is_active = $_POST['is_active'];
    $t->email = $_POST['email'];
    $t->avatar = $file_name;

    $t->save();
   
 
    return redirect('/admin/admin_users');


}
function them(){
    return view('admin.admin_users.them');
}
function capnhat($id){

    $users = Admin::find($id);
    
    return view('admin.admin_users.capnhat',['t'=>$users]);
  
}
function capnhat_(Request $request,$id){
    $t= Admin::find($id);


            $file_name = null;
        if($request->has('avatar')){
            $file = $request->avatar;
            $ext = $request->avatar->extension();
            $file_name = time().'-'.'admin_users'. '.' .$ext;
            $file->move(public_path('upload'), $file_name);
        }
    $request->merge(['avatar' => $file_name]);
    
     $t->last_name = $_POST['last_name'];
    $t->first_name = $_POST['first_name'];
    $t->username = $_POST['username'];
    $t->password = $_POST['password'];
    $t->full_name = $_POST['first_name'].$_POST['last_name'];
    $t->gender=  $_POST['gender'];
    $t->phone = $_POST['phone'];
    //role_id
    $t->address = $_POST['address'];
    //province
    $t->province = $_POST['province'];
    //district
    $t->district = $_POST['district'];
    //ward
    $t->ward = $_POST['ward'];

    $t->birthday = $_POST['birthday'];
    $t->is_active = $_POST['is_active'];
    $t->email = $_POST['email'];
    $t->avatar = $file_name;
    //created_at
    // 
    

    $t->save();
    

}
}
