<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customer_emails;
use Illuminate\Http\Request;

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
}
