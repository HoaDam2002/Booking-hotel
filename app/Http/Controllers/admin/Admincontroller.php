<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;

use Illuminate\Support\Carbon;


class Admincontroller extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index(){

        $selectedYear = Carbon::now();

        $revenues = Bookings::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total_revenue')
        ->whereYear('created_at', $selectedYear)
        ->groupBy('year', 'month')
        ->get()->toArray();

        $sumRevenues = [1 => null, 2 => null, 3 => null, 4 => null, 5 => null, 6 => null, 7 => null, 8 => null, 9 => null, 10    => null, 11 => null, 12 => null];

        foreach($revenues as $value) {
            // dd($value);
            $sumRevenues[$value['month']] = $value['total_revenue'];
        }

        // dd($sumRevenues);

        ////thống kê 
        return view('admin.pages.dashboard.Dashboard', compact('sumRevenues'));
    }

}
