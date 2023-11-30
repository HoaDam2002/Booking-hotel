<?php

namespace App\Http\Controllers\tichhop;

use App\Http\Controllers\Controller;
use App\Models\tichhop\Luong;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $luong = Luong::all()->toArray();
        // dd($Luong);
        return view('admin.pages.typeroom.typeroom',compact('luong'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $data = $request->all();

        if(Luong::create($data)){
            $luong = Luong::all()->toArray();
            return response()->json(['luong' => $luong ]);
        }else{
            return response()->json(['error' => 'Thêm Thất Bại']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete(Request $request)
    {
        $MaLuong = $request->all();

        if(Luong::where('MaLuong', $MaLuong)->delete()){
            return response()->json(['success' => 'Thành Công']);
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

        if(Luong::where('MaLuong',$data['MaLuong'])->update($data)){
            $luong = Luong::all()->toArray();
            return response()->json(['luong' => $luong ]);
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
