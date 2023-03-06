<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddjobController extends Controller
{
    public function index()
    {
        return view('client.addjobs.index');
    }
}
