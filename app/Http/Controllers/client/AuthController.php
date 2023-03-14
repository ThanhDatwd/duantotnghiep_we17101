<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\SendVerifyEmail;
use App\Models\User;
use App\Models\user_verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login_user(Request $request){
        
        // auth()->login($user)
    //     Auth::guard('web')->attempt(['email'=>"dat2@gmail.com",'password'=>"123456"],true);
    //     // dd(Auth::guard('web')->check());
    //    $user=Auth::user();
    //     //    dd('xin chào');
    //     // session()->put('user',$user);
    //     return redirect()->route('clienthome');
        $request->validate([
            'phone'=>'required',
            'password'=>'required'
        ]);

        $arr = [
            'email' => $request->phone,
            'password' =>  $request->password,
            "is_admin"=>false
        ];
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('web')->attempt($arr)) {
                return redirect()->route('client');
            
        } else {
            return back()->with('fail','Tài khoản hoặc mật khẩu không đúng'); 
        }
        return back()->with('fail','Tài khoản không tồn tại'); 
    }
    public function show_login_user()
    {
        return view('client.login.index');

    }
    public function show_register_user()
     {
         return view('client.register.index');
     }
    public function verify_email($token)
     {
        // dd($token);
        $user_v=user_verify::where('verify_email_code',$token)->first();
        if($user_v){
            $user=new User();
            $user->username=$user_v->username;
            $user->email=$user_v->email;
            $user->password=bcrypt($user->password) ;
            $user->phone=$user_v->phone;
            $user->address=$user_v->address;
            $user->gender=true;
            $user->save();
           
            //ĐĂNG NHẬP  VÀ CHUYỂN HƯỚNG
            user_verify::where('verify_email_code',$token)->delete();
        }
        else{
            dd('không có nha');
        }
     }
    
    public function register_user(Request $request){
        // dd('xin chào');
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));
        $user=new user_verify();
         $user->username='thanhdat';
         $user->email='nguyenthanhdatntd02@gmail.com';
         $user->password=bcrypt('123456') ;
         $user->phone='0123456089';
         $user->address='adad adad  ajda da';
         $user->verify_email_code=$token;
         $user->save();
         $mail=new SendVerifyEmail($token);
         Mail:: to("nguyenthanhdatntd02@gmail.com")->queue($mail);
         dd('xin chào');

        //  return redirect()->route('login');       
     }



    /////////////////////////////////////////
    ////////////////////////////////////////////
    public function login_admin(Request $request){
      
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $arr = [
            'email' => "dat2@gmail.com",
            'password' => "123456",
            "is_admin"=>true
        ];
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('admin')->attempt($arr)) {

            return redirect()->route('site');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

            return back()->with('fail','Tài khoản hoặc mật khẩu không đúng'); 
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
        
        return back()->with('fail','Không có tài khoản này'); 
    }
    public function show_login_admin(){
        return view('auth.login');

    }
   
    public function logout_admin(){
        // if(Session::has('loginId')){
        //     Session::pull('loginId');
            return  redirect('/login');
        // }
    }
}
