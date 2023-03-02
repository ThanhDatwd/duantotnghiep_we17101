<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
// use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');

    }
    public function loginUser(Request $request){
      
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $user = DB::table('users')->where('username','=',$request->username)->first();
        // dd($user);
        $credentials = [
            'username' => session('username'),
            'password' => session('password'),
        ];
        if($user) {
            // return redirect()->route('/');
            if($request->password == $user->password){
                $request->session()->put('loginId'.$user->id);
                // dd($request);
                return redirect('/admin');

            }else{
                // dd('ssa');
                return back()->with('fail','Mật khẩu không đúng'); 
  
            }
        }
        
        return back()->with('fail','Không có tài khoản này'); 
    }
    public function regiterUser(){
        $username = $request['username'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return redirect()->route('login');       
    }
    public function logout(){
        // if(Session::has('loginId')){
        //     Session::pull('loginId');
            return  redirect('/login');
        // }
    }
}
