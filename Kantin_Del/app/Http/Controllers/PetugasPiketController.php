<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetugasPiketController extends Controller
{


    public function getAdd(){

        $user = Auth::user();
        $petugas = DB::table('users')->orderBy('nama')->get();
        $kantin = DB::table('kantin')->orderBy('nama')->orderBy('lantai')->get();

        $data = [
            'petugas' => $petugas,
            'kantin' => $kantin,
            'user' => $user
        ];

        return view('pages.piket.petugas.add', $data);
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'user_id' => ['required', 'exists:users,id'],
            'kantin_id' => ['required', 'exists:kantin,id'],
            'hari' => ['required'],
        ]);

        DB::table('jadwal_piket')->insert([
            'user_id' => $request->user_id,
            'kantin_id' => $request->kantin_id,
            'hari' => $request->hari,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('piket/list');

    }


    public function getEdit($user_id, $kantin_id){



        $user = Auth::user();
        $petugas = DB::table('users')->orderBy('nama')->get();
        $kantin = DB::table('kantin')->orderBy('nama')->orderBy('lantai')->get();

        $jadwal = DB::table('jadwal_piket')->where('user_id', $user_id)->where('kantin_id', $kantin_id)->first();
        if(!$jadwal){
            return redirect()->route('piket/list');
        }


        $user= Auth::user();
        $data = [
            'jadwal' => $jadwal,
            'petugas' => $petugas,
            'kantin' => $kantin,
            'user' => $user
        ];

        return view('pages.piket.petugas.edit', $data);
    }


    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => ['required', 'exists:jadwal_piket,id'],
            'user_id' => ['required', 'exists:users,id'],
            'kantin_id' => ['required', 'exists:kantin,id'],
            'hari' => ['required'],
        ]);

        DB::table('jadwal_piket')->where('id', $request->id)->update([
            'user_id' => $request->user_id,
            'kantin_id' => $request->kantin_id,
            'hari' => $request->hari,
            'updated_at' => now(),
        ]);

        return redirect()->route('piket/list');

    }

    public function getDelete($user_id, $kantin_id){

        DB::table('jadwal_piket')->where('user_id', $user_id)->where('kantin_id', $kantin_id)->delete();
        return redirect()->route('piket/list');

    }

}
