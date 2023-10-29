<?php

namespace App\Http\Controllers\api\frontend;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listBooking(Request $request)
    {
        $data = $request->all();
        $idUser = $data['idUser'];
        $booking = Bookings::with(['room', 'room.typeRoom'])->where('idUser', $idUser)->get()->toArray();
        return response()->json(['data' => $booking],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function booking(Request $request)
    {

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
