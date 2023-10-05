<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;

class BookingController extends Controller
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
        $data = Bookings::with('room')->get()->toArray();
        // dd($data);
        return view('admin.pages.booking.booking', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function delete(Request $request) {
        $data = $request->all();
        $bookingData = Bookings::findOrFail($data['id']);

        if($bookingData->delete()) {
            return response()->json(['success' => 'Xóa thành công']);
        }else {
            return response()->json(['error' => 'Xóa thất bại']);
        }
    }
    public function create()
    {
        //
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
