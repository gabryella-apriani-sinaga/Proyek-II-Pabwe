<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlergiPenggunaController extends Controller
{

    public function list(){

        $alergi = DB::table('alergi')->orderByDesc('created_at')->get();
        $user = Auth::user();

        $data = [
            'alergi' => $alergi,
            'user' => $user
        ];

        return view('pages.alergi.list', $data);
    }


    public function getAdd(){
        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('pages.alergi.add', $data);
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'file' => ['required', 'file'],
            'judul' => ['required']
        ]);

        $user = Auth::user();

        $image = md5($user->email) . '_' . time() .'_'. $request->file->getClientOriginalName();
        $path = 'images/alergi';
        $request->file->move($path, $image);

        DB::table('alergi')->insert([
            'user_id' => $user->id,
            'judul' => $request->judul,
            'file' => asset( $path . "/" . $image),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('alergi/pengguna/list');

    }

    public function getEdit($alergi_id){

        $alergi = DB::table('alergi')->where('id', $alergi_id)->first();
        if(!$alergi){
            return redirect()->route('alergi/pengguna/list');
        }

        $user= Auth::user();
        $data = [
            'alergi' => $alergi,
            'user' => $user
        ];

        return view('pages.alergi.edit', $data);
    }

    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => ['required', 'exists:alergi,id'],
            'judul' => ['required'],
        ]);

        $user = Auth::user();
        $alergi = DB::table('alergi')->where('id', $request->id)->first();

        if($alergi->status == 1){
            return redirect()->route('alergi/pengguna/list');
        }

        if($request->file){

            $image = md5($user->email) . '_' . time() .'_'. $request->file->getClientOriginalName();
            $path = 'images/alergi';
            $request->file->move($path, $image);

            if($alergi){
                $old_file = str_replace(url("/") . "/", "", $alergi->foto);
                unlink($old_file);
            }

            DB::table('alergi')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'status' => 0,
                'file' => asset( $path . "/" . $image),
                'updated_at' => now(),
            ]);

        }else{

            DB::table('alergi')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'status' => 0,
                'updated_at' => now(),
            ]);

        }

        return redirect()->route('alergi/pengguna/list');

    }

    public function getDelete($alergi_id){

        DB::table('alergi')->where('id', $alergi_id)->delete();
        return redirect()->route('alergi/pengguna/list');

    }

}
