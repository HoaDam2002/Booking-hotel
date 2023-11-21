<?php

namespace App\Http\Controllers\api\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginMemberRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\api\frontend\RegisterRequest;
class UserController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function login(LoginMemberRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level,
        ];

        $remember = false;

        if ($request->remeber_me) {
            $remember = true;
        }

        if ($this->doLogin($login, $remember)) {

            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(
                [
                    'success' => 'success',
                    'token' => $token,
                    'Auth' => Auth::user()
                ],
                $this->successStatus
            );

        } else {
            return response()->json(
                [
                    'response' => 'error',
                    'errors' => ['errors' => 'invalid email or password'],
                ],
                $this->successStatus
            );
        }
    }

    protected function doLogin($attempt, $remember)
    {

        if (Auth::attempt($attempt, $remember)) {
            return true;
        } else {
            return false;
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        // $file = $request->get('avatar');
        // if ($file) {
        //     $image = $file;
        //     $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        //     $data['avatar'] = $name;
        // }

        $data['level'] = 0;

        $data['password'] = bcrypt($data['password']);

        unset($data['password_confirmation']);

        if ($getUser = User::create($data)) {
            // if ($file) {
            //     Image::make($file)->save(public_path('upload/user/avatar/') . $data['avatar']);
            // }
            return response()->json([
                'message' => 'success',
                $getUser
            ], JsonResponse::HTTP_OK);
        } else {
            return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
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
