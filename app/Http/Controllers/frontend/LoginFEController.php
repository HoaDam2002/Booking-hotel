<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginMemberRequest;
use \Auth;
use App\Http\Requests\RegisterFERequest;
use App\Models\User;

class LoginFEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pages.Account.Login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(LoginMemberRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];

        $remember = false;

        if ($request->remeber_me) {
            $remember = true;
        }

        if (Auth::attempt($login, $remember)) {
            return redirect()->intended();
        } else {
            return redirect()->back()->withErrors('Sai Email hoặc Mật khẩu');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function register()
    {
        return view('frontend.pages.Account.registration');
    }

    /**
     * Display the specified resource.
     */
    public function registration(RegisterFERequest $request)
    {
        $data = $request->all();

        $data['level'] = 0;

        $avatar = $request->avatar;

        $data['avatar'] = $avatar->getClientOriginalName();

        $data['password'] = bcrypt($data['password']);

        unset($data['password_comfirm']);

        // dd($data);

        if (!is_dir('upload/user/')) {
            mkdir('upload/user/');
        }

        if (!is_dir('upload/user/avatar/')) {
            mkdir('upload/user/avatar/');
        }

        if (User::create($data)) {
            $avatar->move('upload/user/avatar', $avatar->getClientOriginalName());
            return redirect('login/user')->with('success', __('Đăng ký thành công.'));
        } else {
            return redirect()->back()->withErrors('Đăng ký thất bại');
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
