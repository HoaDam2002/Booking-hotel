<?php

use Illuminate\Support\Facades\Route;

///admin
// use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\reviewroomcontroller;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TyperoomController;
use App\Models\Service;

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

/* Auth::routes(); */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/blogs', [BlogsController::class, 'index']);

    Route::get('/room', [RoomController::class, 'index']);

    Route::get('/typeroom', [TyperoomController::class, 'index']);

    Route::get('/booking', [BookingController::class, 'index']);

    Route::get('/service', [ServiceController::class, 'index']);

    Route::get('/reviewroom', [reviewroomcontroller::class, 'index']);

});



