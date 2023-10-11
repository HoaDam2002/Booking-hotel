<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Service;
use App\Models\Typeroom;

use \Auth;

// use Carbon\Carbon;




class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'home']);
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->level == 1) {
            Auth::logout();
        }
        $rooms = Room::with('typeRoom')->get()->toArray();
        $typeroom = Typeroom::all()->toArray();

        // dd($typeroom);
        // dd(Auth::user());
        $service = Service::all()->toArray();


        return view('frontend.pages.home.home', compact('rooms', 'service', 'typeroom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function renderRoom()
    {

    }


    public function search()
    {

        return view('frontend.pages.search.search');
    }

    public function actionSearch(Request $request)
    {
        $data = $request->all();




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
