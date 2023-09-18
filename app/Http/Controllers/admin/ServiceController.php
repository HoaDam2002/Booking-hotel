<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $data = Service::get()->toArray();
      return view('admin.pages.service.service', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request, ServiceRequest $serviceRequest) 
    {
        $data = $request->all();
        
        $data['idHotel'] = 1;

        if(Service::create($data)) {
            return redirect()->back()->with('success', __('Add Service Success'));
        }else {
            return redirect()->back()->withErrors('Add Service Fail');
        }
    }

    public function delete(Request $request) {
        $data = $request->all();

        if(Service::where('id', $data['id'])->delete()) {
            return redirect()->back()->with('success',__('Delete Service success'));
        }else {
            return redirect()->back()->withErrors('Delete Service Error');
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
