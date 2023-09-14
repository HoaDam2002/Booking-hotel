<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typeroom;

class usercontroller extends Controller
{
    public function index(){
        return view('admin.pages.user.user');
    }
}
