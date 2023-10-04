<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infobookingcontroller extends Controller
{
    public function index(){
        return view('frontend.pages.booking.infobooking');
    }
}
