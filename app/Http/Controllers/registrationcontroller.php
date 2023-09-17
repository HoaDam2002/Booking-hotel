<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrationcontroller extends Controller
{
    public function index(){
        return view('frontend.pages.Account.registration');
    }
}
