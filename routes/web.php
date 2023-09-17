<?php

use App\Http\Controllers\accoutuesrcontroller;
use App\Http\Controllers\admin\Admincontroller;
use Illuminate\Support\Facades\Route;

///admin
// use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\reviewroomcontroller;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TyperoomController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\profilecontroller;
use App\Http\Controllers\admin\usercontroller;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Service;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\RoomFEController;
use App\Http\Controllers\frontend\BlogFEController;
use App\Http\Controllers\loginusercontroller;
use App\Http\Controllers\registrationcontroller;

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

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => 'admin',
], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin/login');
    Route::get('/home', [Admincontroller::class, 'index']);

    //Blogs

    Route::get('/blogs', [BlogsController::class, 'index']);
    Route::post('/blogs', [BlogsController::class, 'insert']);

    Route::post('/blogs/edit', [BlogsController::class, 'edit']);
    Route::post('/blogs/update', [BlogsController::class, 'update']);
    Route::post('/blogs/delete', [BlogsController::class, 'delete']);

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

    Route::get('/service', [ServiceController::class, 'index']);

    Route::get('/reviewroom', [reviewroomcontroller::class, 'index']);

    Route::get('/profile', [profilecontroller::class, 'index']);

    Route::get('/user', [usercontroller::class, 'index']);


    Route::get('/logout', [LogoutController::class, 'logout']);


});
//home
Route::get('/', [HomeController::class, 'index']);

//room
Route::get('room', [RoomFEController::class, 'index']);
Route::get('room/detail/{id}', [RoomFEController::class, 'RenderBlogDetail']);


//blog
Route::get('blog', [BlogFEController::class, 'index']);
Route::get('/login/user', [loginusercontroller::class, 'index']);

Route::get('/register/user', [registrationcontroller::class, 'index']);










