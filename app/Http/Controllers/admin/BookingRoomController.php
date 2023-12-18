<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class BookingRoomController extends Controller
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
        $currentDay = Carbon::now();

        $dayNow = $currentDay->format('d/m/Y');

        $nextDay = $currentDay->copy()->addDay()->format('d/m/Y');


        return view('admin.pages.BookingRoom.BookingRoom', compact('dayNow', 'nextDay', 'currentDay'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function InfoPayment() 
    {
        return view('admin.pages.payment.payment');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
