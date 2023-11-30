<?php

namespace App\Http\Controllers\tichhop;

use App\Http\Controllers\Controller;
use App\Models\tichhop\PhongBan;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phongban = PhongBan::all()->toArray();
        return view('admin.pages.blogs.blog',compact('phongban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $data = $request->all();

        if(PhongBan::create($data)){
            $phongban = PhongBan::all();
            return response()->json(['phongban' => $phongban ]);
        }else{
            return response()->json(['error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete(Request $request)
    {
        $data = $request->all();
        if(PhongBan::where('MaPhongBan', $data)->delete()){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['error' => true]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = $request->all();

        if(PhongBan::where('MaPhongBan',$data['MaPhongBan'])->update($data)){
            $phongban = PhongBan::all()->toArray();
            return response()->json(['phongban' => $phongban]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
