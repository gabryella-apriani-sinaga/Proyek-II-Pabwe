<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlergiController extends Controller
{

    public function list(){

        $pending = DB::table('alergi')->where('status', 0)->get();

        $alergi = DB::table('alergi')->distinct()->select('judul')->where('status', 1)->get();
        foreach ($alergi as $k => $a) {
            $alergi[$k]->total = DB::table('alergi')->where('judul', $a->judul)->count();
        }

        $user = Auth::user();

        $data = [
            'pending' => $pending,
            'alergi' => $alergi,
            'user' => $user
        ];

        return view('pages.alergi.kelola.list', $data);
    }

    public function approved($alergi_id, $status){

        $user = Auth::user();

        if($status == 0){
            DB::table('alergi')->where('id', $alergi_id)->update([
                'status' => 2,
                'user_approved' => $user->id,
                'approved_date' => date("Y-m-d"),
                'updated_at' => now()
            ]);
        }else{
            DB::table('alergi')->where('id', $alergi_id)->update([
                'status' => 1,
                'user_approved' => $user->id,
                'approved_date' => date("Y-m-d"),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('alergi/list');

    }

}
