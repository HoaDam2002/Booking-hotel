<?php

namespace App\Http\Controllers\api\frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public $successStatus = 200;

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
    public function getRoom()
    {
        $rooms = Room::with('typeRoom')->get();
        return response()->json(['room' => $rooms],$this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getRoomDetail(string $id)
    {
        $room = Room::with('typeRoom')->where('id', $id)->get()->toArray();
        $service = Service::all();

        return response()->json(['roomDetail'=> $room,'service' => $service],$this->successStatus);
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
