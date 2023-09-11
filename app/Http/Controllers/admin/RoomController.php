<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use  App\Http\Requests\admin\RoomRequest;
use \Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeroom = Typeroom::all()->toArray();
        $rooms = Room::all()->toArray();
        // dd($rooms);
        return view('admin.pages.room.room',compact('typeroom','rooms',));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function EditImage($array = [])
    {
        $id_user = \Auth::user()->id;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        foreach($array as $image)
            {
                $name = $date."_".$image->getClientOriginalName();
                $name_2 = "hinh85".$date."_".$image->getClientOriginalName();
                $name_3 = "hinh329".$date."_".$image->getClientOriginalName();
                  //$image->move('upload/product/', $name);
                $path = public_path('upload/product/'.$id_user.'/' . $name);
                $path2 = public_path('upload/product/'.$id_user.'/' . $name_2);
                $path3 = public_path('upload/product/'.$id_user.'/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);

                $data[] = $name;
            }

        return $data;
     }

    public function create(RoomRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $data = $request->all();

        $image = $data['image'];

        $name = $date."_".$image->getClientOriginalName();
        $name_2 = "hinh360".$date."_".$image->getClientOriginalName();
        $name_3 = "hinh750".$date."_".$image->getClientOriginalName();

        $path = public_path('upload/admin/room/' . $name);
        $path2 = public_path('upload/admin/room/'. $name_2);
        $path3 = public_path('upload/admin/room/'. $name_3);

        // dd($data['image']);

        $data['image'] = $name;

        $data['idHotel'] = '1';
        // dd($data);
        if(Room::create($data)){
            Image::make($image->getRealPath())->save($path);
            Image::make($image->getRealPath())->resize(360, 234)->save($path2);
            Image::make($image->getRealPath())->resize(750, 429)->save($path3);
            return redirect('admin/room')->with('success',__('Thêm phòng thành công.'));
        }else{
            return redirect('admin/room')->withErrors('Thêm phòng thất bại');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit(Request $request)
    {
        $data = $request->all();
        // dd($data);
    }

}
