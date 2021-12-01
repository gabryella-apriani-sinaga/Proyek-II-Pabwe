<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LokasiPiketController extends Controller
{

    public function getAdd(){

        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('pages.piket.lokasi.add', $data);
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'nama' => ['required'],
            'lantai' => ['required', 'numeric'],
        ]);

        DB::table('kantin')->insert([
            'nama' => $request->nama,
            'lantai' => $request->lantai,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('piket/list');

    }


    public function getEdit($kantin_id){

        $kantin = DB::table('kantin')->where('id', $kantin_id)->first();
        if(!$kantin){
            return redirect()->route('piket/list');
        }


        $user= Auth::user();
        $data = [
            'kantin' => $kantin,
            'user' => $user
        ];

        return view('pages.piket.lokasi.edit', $data);
    }


    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => ['required', 'exists:kantin,id'],
            'nama' => ['required'],
            'lantai' => ['required'],
        ]);

        DB::table('kantin')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'lantai' => $request->lantai,
            'updated_at' => now(),
        ]);

        return redirect()->route('piket/list');

    }

    public function getDelete($kantin_id){

        DB::table('kantin')->where('id', $kantin_id)->delete();
        return redirect()->route('piket/list');

    }


}
