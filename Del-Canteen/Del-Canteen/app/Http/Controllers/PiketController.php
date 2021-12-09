<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class PiketController extends Controller
{

    public function list(){

        $piket = DB::table('jadwal_piket')->orderByDesc('created_at')->get();
        $user = Auth::user();

        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumaat'];

        $jadwal = [];

        $kantin = DB::table('kantin')->orderBy('nama')->orderBy('lantai')->get();
        foreach ($kantin as $key => $value) {
            $kantin_id = $value->id;

            $kantin[$key]->hari = DB::table('jadwal_piket')->distinct('hari')->select('hari')->where('kantin_id', $value->id)->get();

            foreach ($kantin[$key]->hari as $kh => $h) {
                $nama_hari = $h->hari;
                $kantin[$key]->hari[$kh]->users = DB::table('users')->whereIn('id', function($q) use ($nama_hari, $kantin_id){
                    $q->select('user_id')->from(DB::table('jadwal_piket'))->where('hari', $nama_hari)->where('kantin_id', $kantin_id);
                })->get();
            }
        }


        $data = [
            'piket' => $piket,
            'user' => $user,
            'kantin' => $kantin
        ];

        return view('pages.piket.list', $data);
    }




}
