<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typeroom;

class TyperoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    //  {
    //      $this->middleware('auth');
    //  }

    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        return view('admin.pages.typeroom.typeroom');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if(Typeroom::create($data)){
            return redirect()->back()->with('success',__('Update profile success.'));
        }else{
            return redirect()->back()->withErrors('Update profile error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
}
