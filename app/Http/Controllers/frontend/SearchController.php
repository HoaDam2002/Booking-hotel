<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use App\Models\Bookings;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pages.search.search');
    }

    public function search(Request $request) {
        // session()->flush();
        session()->forget('timeBooking');
        $search = $request->all();

        $ngayCheckIn = "";
        $ngayCheckOut = "";

        if(!empty($search['checkIn']) && !empty($search['checkOut'])) {
            $ngayCheckIn = Carbon::createFromFormat('d F, Y', $search["checkIn"])->format('y-m-d 14:00:00');
            $ngayCheckOut = Carbon::createFromFormat('d F, Y', $search["checkOut"])->format('y-m-d 12:00:00');
            $search["checkIn"] = $ngayCheckIn;
            $search["checkOut"] = $ngayCheckOut;
            session()->push('timeBooking',$search);
        }

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

        // Kiểm tra và áp dụng điều kiện lọc cho loại phòng (nếu có)
        if (!empty($search['typeroom'])) {
            $roomsQuery->where('roomTypeId', $search['typeroom']);
        }

        // Kiểm tra và áp dụng điều kiện lọc cho số lượng người (nếu có)
        if (!empty($search['people'])) {
            $roomsQuery->where('Capacity', '>=', $search['people']);
        }

        Paginator::useBootstrap();

        // Lấy danh sách các phòng thoả mãn các điều kiện đã áp dụng
        $availableRooms = $roomsQuery->paginate(6);

        return view('frontend.pages.search.search', compact('availableRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
