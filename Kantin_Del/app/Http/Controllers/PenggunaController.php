<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{

    public function list(){

        $pengguna = DB::table('users')->orderBy('nama')->get();
        $user = Auth::user();

        $data = [
            'pengguna' => $pengguna,
            'user' => $user
        ];

        return view('pages.pengguna.list', $data);
    }


    public function getAdd(){

        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('pages.pengguna.add', $data);
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'nama' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'role' => ['required', 'numeric'],
            'password' => ['required']
        ]);

        DB::table('users')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pengguna/list');

    }



    public function getEdit($pengguna_id){

        $user = Auth::user();
        $pengguna = DB::table('users')->where('id', $pengguna_id)->first();
        if(!$pengguna){
            return redirect()->route('pengguna/list');
        }

        $data = [
            'pengguna' => $pengguna,
            'user' => $user
        ];

        return view('pages.pengguna.edit', $data);
    }


    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => ['required', 'exists:users,id'],
            'nama' => ['required'],
            'email' => ['required'],
            'role' => ['required', 'numeric'],
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'updated_at' => now(),
        ]);

        return redirect()->route('pengguna/list');

    }


    public function getDelete($pengguna_id){

        
        DB::table('users')->where('id', $pengguna_id)->delete();
        return redirect()->route('pengguna/list');

    }


}
