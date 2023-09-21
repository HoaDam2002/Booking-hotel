<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $id = Auth::id();
        // $data = User::findOrFail($id);
        $data = User::where('id', $id)->get()->toArray();
        // dd($data);
        return view("admin.pages.profile.profile", compact('data'));
    }


    public function update(Request $request, ProfileRequest $profileRequest)
    {
        $id = Auth::id();

        $user = User::findOrFail($id);

        $imageOld = $user->avatar;

        $data = $request->all();

        $file = $request->avatar;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));
        if(!empty($file)) {
            $data['avatar'] = $date.'_'.$file->getClientOriginalName();
        }else {
            $data['avatar'] = $user->avatar;
        }
        
        if($data["password"]) {
            $data['password'] = bcrypt($data['password']);
        }else {
            $data['password'] = $user->password;
        }
        
        // dd($user->avatar);

        if($user->update($data)) {
            if(!empty($file)) {
                if($imageOld) {
                    unlink('upload/admin/user/'.$imageOld);
                }
                $file->move('upload/admin/user/', $date.'_'.$file->getClientOriginalName());
            }
            return redirect()->back()->with('success',__('Update Profile User Success'));
        }else {
            return redirect()->back()->withErrors('Update Profile User Fail');
        }
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
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
