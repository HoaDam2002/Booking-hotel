<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Room;
use App\Models\Bookings;

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
    public function search(Request $request)
    {
        $ngayCheckIn = $request->checkin;
        // $ngayCheckIn = Carbon::parse($ngayCheckIn);
        // $ngayCheckIn = $ngayCheckIn->format('Y-m-d 14:00:00');

        $ngayCheckOut = $request->checkout;
        // $ngayCheckOut = Carbon::parse($ngayCheckOut);
        // $ngayCheckOut = $ngayCheckOut->format('Y-m-d 14:00:00');

        $ngayCheckIn = Carbon::parse($ngayCheckIn)->format('y-m-d 14:00:00');
        $ngayCheckOut =  Carbon::parse($ngayCheckOut)->format('y-m-d 12:00:00');

        // dd($ngayCheckIn, $ngayCheckOut);
        $roomsQuery = Room::whereDoesntHave('bookings', function ($query) use ($ngayCheckIn, $ngayCheckOut) {
            $query->where(function ($query) use ($ngayCheckIn, $ngayCheckOut) {
                $query->whereBetween('checkIn', [$ngayCheckIn, $ngayCheckOut])
                    ->orWhereBetween('checkOut', [$ngayCheckIn, $ngayCheckOut])
                    ->orWhere(function ($query) use ($ngayCheckIn, $ngayCheckOut) {
                        $query->where('checkIn', '<', $ngayCheckIn)
                            ->where('checkOut', '>', $ngayCheckOut);
                    });
            });
        });

        $value = $roomsQuery->with('typeRoom')->get();


        return response()->json(['data' => $value]);
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
