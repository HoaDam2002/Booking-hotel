<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateFrofileFeRequest;
use \Auth;
use App\Models\User;
use App\Http\Requests\ResetPasswordRequest;

class ProfileFEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->toArray();
        return view('frontend.pages.profile.profile',compact('user'));
    }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'profile']);
            return $next($request);
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateProfile(UpdateFrofileFeRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $data = $request->all();

        $id = Auth::id();

        $user = User::findOrFail($id);

        $imageOld = $user->avatar;

        $file = $request->avatar;

        if(!empty($file)){
            $image = $file->getClientOriginalName();
        }else{
            $image = $user->avatar;
        }

        $data['avatar'] = $image;

        if($user->update($data)) {
            if(!empty($file)) {
                if($imageOld) {
                    unlink('upload/user/avatar/'.$imageOld);
                }
                $file->move('upload/user/avatar/', $date.'_'.$file->getClientOriginalName());
            }
            return redirect()->back()->with('success',__('Update Profile User Success'));
        }else {
            return redirect()->back()->withErrors('Update Profile User Fail');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ResetPassword()
    {
        return view('frontend.pages.profile.resetPassword');
    }

    /**
     * Display the specified resource.
     */
    public function ResetPasswordPost(ResetPasswordRequest $request)
    {
        $user = Auth::user();

        if(password_verify($request->password,$user['password'])){
            $data = bcrypt($request->password_change);
            // dd($data);
            if($user->update(['password' => $data])){
                return redirect()->back()->with('success',__('Reset Password Success'));
            }else{
                return redirect()->back()->withErrors('Reset Password Fail');
            }
        }else{
            return redirect()->back()->withErrors('Password current not match !!!');
        }
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
