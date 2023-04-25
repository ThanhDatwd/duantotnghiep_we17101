<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\customer_emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminContactController extends Controller
{
    public function index()
    {
       $customer_emails=customer_emails::paginate(10);
       $data=[
        "customer_emails"=>$customer_emails
       ];
       return view('admin.contact.index',$data);


    }
    public function show($id)
    {
        $email=customer_emails::where('id',$id)->firstOrFail();
        $data=[
            "email"=>$email
        ];
        return view('admin.contact.show',$data);
    }
    public function reply(Request $request)
    {
        $username=$request->username;
        $content= $request->content;
        $mail=new ContactMail($username,$content);
        Mail:: to($request->email)->queue($mail);
        return back()->with('success','Phản hồi email thành công'); 
    }
}
