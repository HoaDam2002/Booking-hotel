<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use App\Http\Requests\RoomRequest;

use \Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $typeroom = Typeroom::all()->toArray();
        $rooms = Room::with('typeRoom')->get()->toArray();
        // dd($rooms);
        return view('admin.pages.room.room',compact('typeroom','rooms',));
    }
    /**
     * Show the form for creating a new resource.
     */


    public function create(RoomRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $data = $request->all();

        $image = $data['image'];

        if(!is_dir('upload/admin/room/')){
            mkdir('upload/admin/room/');
        }

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
        // $data = $data['id'];
        $dataRoom = Room::where('id',$data['id'])->get()->toArray();
        // dd($dataRoom);
        return $dataRoom;
    }

    public function update(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        $data = $request->all();
        // dd($data['id']);
        $flag = 1;
        $roomFind = Room::findOrFail($data['id']);

        // $item = $roomFind->with('typeRoom')->get()->toArray();
        // dd($item);
        // dd($roomFind);
        $oldImage = $roomFind->image;
        // dd($roomFind->image);
        if($request->hasfile('image')){
            $image = $request->image;

            $name = $date."_".$image->getClientOriginalName();
            $name_2 = "hinh360".$date."_".$image->getClientOriginalName();
            $name_3 = "hinh750".$date."_".$image->getClientOriginalName();

            $path = public_path('upload/admin/room/' . $name);
            $path2 = public_path('upload/admin/room/'. $name_2);
            $path3 = public_path('upload/admin/room/'. $name_3);
            // dd($$roomFind->image);
            $data['image'] = $name;

            if($roomFind->update($data)){
                unlink('upload/admin/room/'. $oldImage);
                unlink('upload/admin/room/hinh360' . $oldImage);
                unlink('upload/admin/room/hinh750'. $oldImage);
                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(360, 234)->save($path2);
                Image::make($image->getRealPath())->resize(750, 429)->save($path3);
                $flag = 2;
            }
        }else {
            $data['image'] = $roomFind->image;
            if($roomFind->update($data)){
                $flag = 2;
            }
        }

        if($flag == 2){
            $item = Room::findOrFail($data['id'])->with('typeRoom')->get()->toArray();

            $itemCon = $item[0]['type_room']['typeName'];


            return response()->json(['data' => json_encode($data),'room' => $itemCon]);
        }else{
            return response()->json(['errors' => 'lỗi']);
        }
    }

    public function delete(Request $request){
        $data = $request->all();

        $roomFind = Room::findOrFail($data['id']);
        $oldImage = $roomFind->image;

        if($roomFind->delete()){
            unlink('upload/admin/room/'. $oldImage);
            unlink('upload/admin/room/hinh360' . $oldImage);
            unlink('upload/admin/room/hinh750'. $oldImage);
            return response()->json(['success' => 'Xóa thành công']);
        }
    }
}
