<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('client.contact.index');
    }
    public function contact_(Request $request)
    {
        // $request->us
        // $mail=new co
        $mail=new ContactMail();
        Mail:: to($request->email)->queue($mail);
    }
}
