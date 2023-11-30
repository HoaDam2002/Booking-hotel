<?php

namespace App\Http\Controllers\tichhop;

use App\Http\Controllers\Controller;
use App\Models\tichhop\ChucVu;
use App\Models\tichhop\Luong;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $luong = Luong::all()->toArray();
        $chucvu = ChucVu::with('luong')->get()->toArray();
        return view('admin.pages.booking.booking', compact('luong', 'chucvu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        if (ChucVu::create($data)) {
            $chucvu = ChucVu::with('luong')->get()->toArray();
            return response()->json(['chucvu' => $chucvu]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete(Request $request)
    {
        $data = $request->all();
        if (ChucVu::where('MaChucVu', $data)->delete()) {
            return response()->json(['chucvu']);
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

        if (ChucVu::where('MaChucVu', $data['MaChucVu'])->update($data)) {
            $chucvu = ChucVu::with('luong')->get()->toArray();
            return response()->json(['chucvu' => $chucvu]);
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
