<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{

    public function index()
    {

        $startDate = Carbon::now()->startOfWeek()->format("Y-m-d");
        $endDate = Carbon::now()->endOfWeek()->format("Y-m-d");

        $startWeekDate = Carbon::now()->startOfWeek();
        $arrTanggal = [];
        for ($i=0; $i < 5; $i++) {
            $arrTanggal[$i] = $startWeekDate->format("Y-m-d");
            $startWeekDate->addDay(1);
        }

        // dd($endDate);
        // $onDate = Carbon::now()->startOfWeek()->format("l");
        // dd($onDate);

        foreach ($arrTanggal as $key => $a) {
            $tmpData = new stdClass;
            $tmpData->tanggal = $a;
            $tmpData->foods =  DB::table('menu_makanan')->where('tanggal', $a)->get();
            $arrTanggal[$key] = $tmpData;
        }

        $currentFoods = DB::table('menu_makanan')->where('tanggal', date("Y-m-d"))->get();

        $user = Auth::user();

        $data = [
            'user' => $user,
            'arrTanggal' => $arrTanggal,
            'currentFoods' => $currentFoods
        ];

        return view('home',$data);

    }
}
