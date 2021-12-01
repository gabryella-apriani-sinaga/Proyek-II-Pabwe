<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MakananController extends Controller
{

    public function list(){

        $foods = DB::table('menu_makanan')->orderByDesc('created_at')->get();
        $user = Auth::user();

        $data = [
            'foods' => $foods,
            'user' => $user
        ];

        return view('pages.makanan.list', $data);
    }


    public function getAdd(){
        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('pages.makanan.add', $data);
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'foto' => ['required', 'file'],
            'nama' => ['required'],
            'waktu' => ['required'],
            'tanggal' => ['required']
        ]);

        $user = Auth::user();

        $image = md5($user->email) . '_' . time() .'_'. $request->foto->getClientOriginalName();
        $path = 'images/makanan';
        $request->foto->move($path, $image);

        DB::table('menu_makanan')->insert([
            'foto' => asset( $path . "/" . $image),
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('makanan/list');

    }

    public function getEdit($makanan_id){

        $makanan = DB::table('menu_makanan')->where('id', $makanan_id)->first();
        if(!$makanan){
            return redirect()->route('makanan/list');
        }


        $user= Auth::user();
        $data = [
            'makanan' => $makanan,
            'user' => $user
        ];

        return view('pages.makanan.edit', $data);
    }

    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => ['required', 'exists:menu_makanan,id'],
            'nama' => ['required'],
            'waktu' => ['required'],
            'tanggal' => ['required']
        ]);

        $user = Auth::user();

        if($request->foto){

            $makanan = DB::table('menu_makanan')->where('id', $request->id)->first();

            $image = md5($user->email) . '_' . time() .'_'. $request->foto->getClientOriginalName();
            $path = 'images/makanan';
            $request->foto->move($path, $image);

            if($makanan){
                $old_file = str_replace(url("/") . "/", "", $makanan->foto);
                unlink($old_file);
            }

            DB::table('menu_makanan')->where('id', $request->id)->update([
                'foto' => asset( $path . "/" . $image),
                'nama' => $request->nama,
                'waktu' => $request->waktu,
                'tanggal' => $request->tanggal,
                'updated_at' => now(),
            ]);
        }
        else{
            DB::table('menu_makanan')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'waktu' => $request->waktu,
                'tanggal' => $request->tanggal,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('makanan/list');

    }

    public function getDelete($makanan_id){

        DB::table('menu_makanan')->where('id', $makanan_id)->delete();
        return redirect()->route('makanan/list');

    }

}
