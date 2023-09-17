<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginusercontroller extends Controller
{
    public function index(){
        return view('frontend.pages.Account.Login');
    }
}
