<?php

use App\Http\Controllers\accoutuesrcontroller;
use App\Http\Controllers\admin\Admincontroller;
use Illuminate\Support\Facades\Route;

///admin
// use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\Chartcontroller;
use App\Http\Controllers\admin\reviewroomcontroller;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TyperoomController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BookingRoomController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Service;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\RoomFEController;
use App\Http\Controllers\frontend\BlogFEController;
use App\Http\Controllers\frontend\LoginFEController;
use App\Http\Controllers\frontend\LogoutFEController;
use App\Http\Controllers\frontend\ProfileFEController;
use App\Http\Controllers\frontend\PayController;
use App\Http\Controllers\StripePaymentsController;

use App\Http\Controllers\Mail\MailController;


use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\ListBookingUserController;

// use App\Http\Controllers\frontend\registrationcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([
    'namespace' => 'Frontend',
], function () {

    Route::get('/', [HomeController::class, 'index']);

    //room

    Route::get('room', [RoomFEController::class, 'index']);
    Route::get('room/detail/{id}', [RoomFEController::class, 'RenderBlogDetail']);


    Route::get('search', [SearchController::class, 'index']);
    Route::post('search', [SearchController::class, 'search']);
    // Route::post('search/page', [SearchController::class, 'search']);

    Route::post('search/inSearchPage', [SearchController::class, 'searchAjax']);
    Route::get('search/roomdetail', [SearchController::class, 'searchRoomDetail']);

    Route::post('search/roomdetail', [SearchController::class, 'searchRoomDetail']);



    //blog
    Route::get('blog', [BlogFEController::class, 'index']);
    Route::get('blog/detail/{id}', [BlogFEController::class, 'blogDetail']);

    //login
    Route::get('/login/user', [LoginFEController::class, 'index']);
    Route::post('/login/user', [LoginFEController::class, 'login']);

    //register
    Route::get('/register/user', [LoginFEController::class, 'register']);
    Route::post('/register/user', [LoginFEController::class, 'registration']);

    Route::group(['middleware' => 'member'], function () {
        //cái gì yêu cầu đăng nhập thì bỏ vô đây
        Route::get('/profile', [ProfileFEController::class, 'index']);
        Route::post('/profile/update', [ProfileFEController::class, 'updateProfile']);

        Route::get('/profile/update/password', [ProfileFEController::class, 'ResetPassword']);
        Route::post('/profile/update/password', [ProfileFEController::class, 'ResetPasswordPost']);
        Route::get('/pay/{id}', [PayController::class, 'index']);

        Route::post('/pay/paying', [PayController::class, 'Paying']);

        Route::get('/infobooking', [ListBookingUserController::class, 'index']);

        Route::get('/payment', [StripePaymentsController::class, 'index']);
        Route::post('/payment', [StripePaymentsController::class, 'payment']);



    });

   // logout
   Route::get('/logout/user', [LogoutFEController::class, 'logout']);
});
//home

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function () {
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('admin/login');
    Route::post('/login',[LoginController::class, 'login']);
    Route::get('/logout', [LogoutController::class, 'logout']);
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [Admincontroller::class, 'index']);
    //Blogs
    Route::get('/blogs', [BlogsController::class, 'index']);
    Route::post('/blogs', [BlogsController::class, 'insert']);

    Route::post('/blogs/edit', [BlogsController::class, 'edit']);
    Route::post('/blogs/update', [BlogsController::class, 'update']);
    Route::post('/blogs/delete', [BlogsController::class, 'delete']);

    //chart
    Route::get('/chart', [Chartcontroller::class, 'index']);

    //room
    Route::get('/room', [RoomController::class, 'index']);
    Route::post('/room', [RoomController::class, 'create']);
    Route::get('/room/edit/', [RoomController::class, 'edit']);
    Route::post('/room/edit/', [RoomController::class, 'edit']);
    Route::post('/room/edit/update', [RoomController::class, 'update']);
    Route::post('/room/delete', [RoomController::class, 'delete']);

    Route::get('/typeroom', [TyperoomController::class, 'index']);
    Route::post('/typeroom', [TyperoomController::class, 'create']);
    Route::post('/typeroom/delete', [TyperoomController::class, 'delete']);


    Route::get('/booking', [BookingController::class, 'index']);
    Route::post('/booking/delete', [BookingController::class, 'delete']);

    Route::get('/service', [ServiceController::class, 'index']);
    Route::post('/service', [ServiceController::class, 'insert']);
    Route::post('/service/delete', [ServiceController::class, 'delete']);

    Route::get('/reviewroom', [reviewroomcontroller::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/delete', [UserController::class, 'delete']);

    Route::get('/bookingroom', [BookingRoomController::class, 'index']);
    Route::get('/infopayment', [BookingRoomController::class, 'InfoPayment']);

});








