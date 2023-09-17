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
        $data = Typeroom::all()->toArray();
        // dd($data);
        return view('admin.pages.typeroom.typeroom', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();

        if(Typeroom::create($data)){
            return redirect()->back()->with('success',__('Update Type Room success.'));
        }else{
            return redirect()->back()->withErrors('Update Type Room error');
        }
    }

    public function delete(Request $request) {
        $data = $request->all();

        if(Typeroom::where('id', $data['id'])->delete()) {
            return redirect()->back()->with('success',__('Delete Type Room success'));
        }else {
            return redirect()->back()->withErrors('Delete Type Room Error');
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
