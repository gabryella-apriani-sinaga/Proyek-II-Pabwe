<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TentangController extends Controller
{

    public function index(){
        $user = Auth::user();

        $totalMakanan = DB::table('menu_makanan')->count();

        $totalMahasiswa = DB::table('users')->where('role', 1)->count();
        $totalMahasiswa += DB::table('users')->where('role', 2)->count();

        $totalKeasramaan = DB::table('users')->where('role', 3)->count();
        $totalStaffKantin = DB::table('users')->where('role', 4)->count();

        $data = [
            'user' => $user,
            'total_makanan' => $totalMakanan,
            'total_mahasiswa' => $totalMahasiswa,
            'total_keasramaan' => $totalKeasramaan,
            'total_staff' => $totalStaffKantin
        ];

        return view('pages.tentang.index', $data);
    }

}
