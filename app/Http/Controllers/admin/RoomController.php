<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use App\Http\Requests\RoomRequest;

use \Intervention\Image\Facades\Image;

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
        // dd($rooms);
        return view('admin.pages.room.room',compact('typeroom','rooms'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function EditImage($array = [])
    {
        $id_user = \Auth::user()->id;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        $data = [];

        foreach($array as $image)
        {
            $name = $date."_".$image->getClientOriginalName();
            $name_2 = "hinh360".$date."_".$image->getClientOriginalName();
            $name_3 = "hinh750".$date."_".$image->getClientOriginalName();

            $path = public_path('upload/admin/room/' . $name);
            $path2 = public_path('upload/admin/room/'. $name_2);
            $path3 = public_path('upload/admin/room/'. $name_3);

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

        if(!is_dir('upload/admin/room/')){
            mkdir('upload/admin/room/');
        }

        $item = $this->EditImage($request->file('image'));

        $data['image'] = json_encode($item);

        $data['idHotel'] = '1';

        // dd($data);

        if(Room::create($data)){
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
        $oldImage = json_decode($roomFind->image);



        if($request->hasfile('image')){

            $item = $this->EditImage($request->file('image'));

            $data['image'] = json_encode($item);

            if($roomFind->update($data)){
                foreach ($oldImage as $image) {
                    unlink('upload/admin/room/'. $image);
                    unlink('upload/admin/room/hinh360' . $image);
                    unlink('upload/admin/room/hinh750'. $image);
                }
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
        $oldImage = json_decode($roomFind['image'], true);

        if($roomFind->delete()){
            foreach ($oldImage as $image) {
                unlink('upload/admin/room/'. $image);
                unlink('upload/admin/room/hinh360' . $image);
                unlink('upload/admin/room/hinh750'. $image);
            }
            return response()->json(['success' => 'Xóa thành công']);
        }
    }
}
