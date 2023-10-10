<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use App\Models\Bookings;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\SearchRequest;


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

    public function doSearch($search = [])
    {
        $ngayCheckIn = "";
        $ngayCheckOut = "";

        // dd($search);

        if (!empty($search['checkIn']) && !empty($search['checkOut'])) {
            $ngayCheckIn = Carbon::createFromFormat('d F, Y', $search["checkIn"])->format('y-m-d 14:00:00');
            $ngayCheckOut = Carbon::createFromFormat('d F, Y', $search["checkOut"])->format('y-m-d 12:00:00');
            $search["checkIn"] = $ngayCheckIn;
            $search["checkOut"] = $ngayCheckOut;
            session()->put('timeBooking', $search);
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
            if($search['people'] == 6){
                $roomsQuery->where('Capacity', '>=', $search['people']);
            }else{
                $roomsQuery->where('Capacity', '<=', $search['people']);
            }
        }

        // dd($roomsQuery);

        return $roomsQuery;
    }

    public function search(SearchRequest $request)
    {
        $search = $request->all();

        // dd($search);

        $dateIn = $search["checkIn"];
        $dateOut = $search["checkOut"];
        $capacity = $search["people"];
        $type = $search["typeroom"];

        $type = Typeroom::where('id', $type)->get('typeName')->toArray();
        // Lấy danh sách các phòng thoả mãn các điều kiện đã áp dụng
        $availableRooms = $this->doSearch($search)->get();

        $roomType = Typeroom::all()->toArray();
        // dd($roomType);
        return view('frontend.pages.search.search', compact('availableRooms', 'dateIn', 'dateOut', 'roomType', 'capacity', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function searchAjax(Request $request)
    {
        $search = $request->all();

        $availableRooms = $this->doSearch($search)->with('typeRoom')->get();

        return response()->json(['data' => $availableRooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function searchRoomDetail(Request $request)
    {
        $data = $request->all();

        $roomId = $data['idRoom'];

        $checkIn = Carbon::createFromFormat('d F, Y', $data["checkIn"])->format('Y-m-d 14:00:00');

        $checkOut = Carbon::createFromFormat('d F, Y', $data["checkOut"])->format('Y-m-d 12:00:00');

        $availableRoomsCount = Bookings::where('idRoom', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('checkIn', [$checkIn, $checkOut])
                    ->orWhereBetween('checkOut', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('checkIn', '<', $checkIn)
                            ->where('checkOut', '>', $checkOut);
                    });
            })
            ->count();

        if($availableRoomsCount == 0){

            $search["checkIn"] = $checkIn;
            $search["checkOut"] = $checkOut;
            session()->put('timeBooking',$search);
            return response()->json(['available' => 'This room is available']);
        }else{
            return response()->json(['notAvailable' => 'This room not available']);
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
