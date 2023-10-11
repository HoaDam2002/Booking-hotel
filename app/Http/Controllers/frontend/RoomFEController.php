<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use App\Models\Service;

class RoomFEController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'room']);
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('typeRoom')->paginate(6);
        $service = Service::all()->toArray();
        $service = Service::all()->toArray();

        return view('frontend.pages.rooms.room',compact('rooms','service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function RenderBlogDetail(string $id)
    {
        $ngayCheckIn = "";
        $ngayCheckOut = "";

        $roomDetail = Room::with('typeRoom')->where('id',$id)->get()->toArray();
        $service = Service::all()->toArray();
        return view('frontend.pages.rooms.room-details',compact('roomDetail','service'));
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
