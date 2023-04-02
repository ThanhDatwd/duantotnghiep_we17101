<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\customer_emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        $company_info=DB::table('company_info')->first();
        $data=[
           "company_info"=>$company_info
        ];
        return view('client.contact.index',$data);
    }
    public function contact_(Request $request)
    {   
        try {
            $customer_email=new customer_emails();
            $customer_email->customer_name=$request->name;
            $customer_email->subject=$request->subject;
            $customer_email->from=$request->from;
            $customer_email->content=$request->content;
            $customer_email->save();
            return back()->with('success','Gửi liên hệ thành công, chúng tôi sẽ sớm phảm hồi email của bạn'); 
        } catch (\Throwable $th) {
            
            return back()->with('fail','Đã có lỗi vui lòng thực hiện lại'); 
        }
        
        // $mail=new ContactMail();
        // Mail:: to($request->email)->queue($mail);
    }
}
