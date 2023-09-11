<?php

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
Route::get('/', [Admincontroller::class, 'index']);

Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Blogs
    Route::get('/blogs', [BlogsController::class, 'index']);
    Route::post('/blogs', [BlogsController::class, 'insert']);

    
    Route::post('/blogs/edit', [BlogsController::class, 'edit']);
    Route::post('/blogs/update', [BlogsController::class, 'update']);
    Route::post('/blogs/delete', [BlogsController::class, 'delete']);


    // Route::post('/blogs/edit/', [BlogsController::class, 'edit']);
    // Route::post('/blogs/update/', [BlogsController::class, 'update']);
    // Route::get('/blogs/edit', [BlogsController::class, 'edit']);



    //////
    Route::get('/room', [RoomController::class, 'index'])->name('admin.room');

    Route::get('/typeroom', [TyperoomController::class, 'index'])->name('admin.typeroom');

    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking');

    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service');

    Route::get('/reviewroom', [reviewroomcontroller::class, 'index'])->name('admin.review');

});



