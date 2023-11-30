<?php

namespace App\Http\Controllers\tichhop;

use App\Http\Controllers\Controller;
use App\Models\tichhop\ChucVu;
use App\Models\tichhop\NhanVien;
use App\Models\tichhop\PhongBan;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phongban = PhongBan::all()->toArray();
        $chucvu = ChucVu::all()->toArray();
        $nhanvien = NhanVien::with('phongban','chucvu','chucvu.luong')->get()->toArray();
        return view('admin.pages.room.room',compact('phongban', 'chucvu','nhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $data = $request->all();

        if(NhanVien::create($data)){
            $nhanvien = NhanVien::with('phongban','chucvu','chucvu.luong')->get()->toArray();
            return response()->json(['nhanvien' => $nhanvien]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete(Request $request)
    {
        $data = $request->all();
        if(NhanVien::where('MaNhanVien',$data)->delete()){
            return response()->json(['success' => 'thanhcong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(Request $request)
    {
        $data = $request->all();

        if(NhanVien::where('MaNhanVien',$data['MaNhanVien'])->update($data)){
            $nhanvien = NhanVien::with('phongban','chucvu','chucvu.luong')->get()->toArray();
            return response()->json(['nhanvien' => $nhanvien ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

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
