<?php

use App\Http\Controllers\api\frontend\BlogController;
use App\Http\Controllers\api\frontend\BookingController;
use App\Http\Controllers\api\frontend\RoomController;
use App\Http\Controllers\api\frontend\SearchController;
use App\Http\Controllers\api\frontend\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'frontend',
], function () {

    route::post('/login',[UserController::class,'login']);

    route::post('/register',[UserController::class,'register']);

    route::get('/room',[RoomController::class,'getRoom']);
    route::get('/room/detail/{id}',[RoomController::class,'getRoomDetail']);

    route::get('/blog',[BlogController::class,'getBlog']);
    route::post('/listBooking',[BookingController::class,'listBooking']);

    route::post('/search',[SearchController::class,'search']);

});

