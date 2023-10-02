<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Bookings;

use Illuminate\Support\Carbon;



class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $room = Room::with('typeRoom')->where('id', $id)->get();

        $room = $room[0];

        $timeBooking = [];

        $checkIn = "";
        $checkOut = "";

        if(session()->has('timeBooking')){
            $timeBooking = session()->get('timeBooking');
            // dd($timeBooking);
            $checkIn = $timeBooking[0]['checkIn'];
            $checkOut = $timeBooking[0]['checkOut'];
        }

        $checkInDate = \DateTime::createFromFormat('y-m-d H:i:s', $checkIn);
        $checkOutDate = \DateTime::createFromFormat('y-m-d H:i:s', $checkOut);

        if ($checkOutDate < $checkInDate) {
            $checkOutDate->modify('+1 day');
        }


        $interval = $checkInDate->diff($checkOutDate);


        $numberOfDays = $interval->days + 1;

        $total = $numberOfDays * $room->price;

        $room['checkInView'] = Carbon::parse($checkIn)->format('d-m-y h:i a');
        $room['checkOutView'] = Carbon::parse($checkOut)->format('d-m-y h:i a');

        $room['checkIn'] = $checkIn;
        $room['checkOut'] = $checkOut;

        return view('frontend.pages.pay.pay',compact('room','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Paying(Request $request)
    {
        $data = $request->all();
        Bookings::create($data);
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
