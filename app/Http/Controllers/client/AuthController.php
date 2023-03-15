<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
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
use Twilio\Rest\Client;
// use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login_user(AuthRequest $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $arr = [
            'email' => $request->email,
            'password' =>  $request->password,
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
            $user->gender=true;
            $user->save();
           
            //ĐĂNG NHẬP  VÀ CHUYỂN HƯỚNG
            user_verify::where('verify_email_code',$token)->delete();
            Auth::guard('web')->attempt(["email"=>$user_v->email,"password"=>$user_v->password]);
            return redirect()->route('client'); 
        }
        else{
            dd('không có nha');
        }
     }
    
    public function register_user(AuthRequest $request){
        $request->validate([
            'phone' => 'required|integer|max:11',
            'email'=>'required|email',
            'username' => 'required',
            'password'=>'required|min',
        ]);
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));
        $user=new user_verify();
         $user->username='thanhdat';
         $user->email='nguyenthanhdatntd02@gmail.com';
         $user->password=bcrypt('123456') ;
         $user->phone='0123456089';
         $user->verify_email_code=$token;
         $user->save();
         $mail=new SendVerifyEmail($token);
         Mail:: to("nguyenthanhdatntd02@gmail.com")->queue($mail);
        // TwilioClient
        // $account_sid = 'AC78a670b0a71308abafb49b9748256141';
        // $auth_token = '8b17951a69e83688b3a975a3a534a6c8';
        // $from_number = '+15404171083';
        // $to_number = '0386352313';
        // $message = "xin chào tôi là bạn";
        
        // // Khởi tạo đối tượng Twilio Client
        // $client = new Client($account_sid, $auth_token);
        
        // // Gửi SMS
        // $message = $client->messages->create(
        //     '+84386352313', // Số điện thoại nhận tin nhắn
        //     array(
        //         'from' => '+15404171083', // Số điện thoại người gửi (đã được xác nhận trong tài khoản Twilio của bạn)
        //         'body' => 'Hello, world!' // Nội dung tin nhắn
        //     )
        // );
        
        // echo $message->sid;

    // dd($message); // In ra kết quả gửi tin nhắn
     }



    /////////////////////////////////////////
    ////////////////////////////////////////////
    public function login_admin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $arr = [
            'email' => $request->email,
            'password' =>  $request->password,
        ];
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('admin')->attempt($arr)) {

            return redirect()->route('sitedashboard');
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
