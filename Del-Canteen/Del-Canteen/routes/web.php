<?php

use App\Http\Controllers\AlergiController;
use App\Http\Controllers\AlergiPenggunaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LokasiPiketController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasPiketController;
use App\Http\Controllers\PiketController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


Route::group(['middleware' => ['verified','check.role:1,2,3,4,5']] , function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/piket/list', [PiketController::class, 'list'])->name('piket/list');
    
    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

});


Route::group(['middleware' => ['verified','check.role:4,5']] , function() {
    Route::get('/makanan/list', [MakananController::class, 'list'])->name('makanan/list');
    Route::get('/makanan/add', [MakananController::class, 'getAdd'])->name('makanan/add');
    Route::post('/makanan/add', [MakananController::class, 'postAdd'])->name('makanan/add');
    Route::get('/makanan/edit/{makanan_id}', [MakananController::class, 'getEdit'])->name('makanan/edit/{makanan_id}');
    Route::post('/makanan/edit', [MakananController::class, 'postEdit'])->name('makanan/edit');
    Route::get('/makanan/delete/{makanan_id}', [MakananController::class, 'getDelete'])->name('makanan/delete/{makanan_id}');
});

Route::group(['middleware' => ['verified','check.role:2,5']] , function() {
    Route::get('/piket/kantin/add', [LokasiPiketController::class, 'getAdd'])->name('piket/kantin/add');
    Route::post('/piket/kantin/add', [LokasiPiketController::class, 'postAdd'])->name('piket/kantin/add');

    Route::get('/piket/kantin/edit/{kantin_id}', [LokasiPiketController::class, 'getEdit'])->name('piket/kantin/edit/{kantin_id}');
    Route::post('/piket/kantin/edit', [LokasiPiketController::class, 'postEdit'])->name('piket/kantin/edit');

    Route::get('/piket/kantin/delete/{kantin_id}', [LokasiPiketController::class, 'getDelete'])->name('piket/kantin/delete/{kantin_id}');

    Route::get('/piket/petugas/add', [PetugasPiketController::class, 'getAdd'])->name('piket/petugas/add');
    Route::post('/piket/petugas/add', [PetugasPiketController::class, 'postAdd'])->name('piket/petugas/add');

    Route::get('/piket/petugas/edit/{user_id}/{kantin_id}', [PetugasPiketController::class, 'getEdit'])->name('piket/petugas/edit/{user_id}/{kantin_id}');
    Route::post('/piket/petugas/edit', [PetugasPiketController::class, 'postEdit'])->name('piket/petugas/edit');

    Route::get('/piket/petugas/delete/{user_id}/{kantin_id}', [PetugasPiketController::class, 'getDelete'])->name('piket/petugas/delete/{user_id}/{kantin_id}');



});


Route::group(['middleware' => ['verified','check.role:5']] , function() {
    Route::get('/pengguna/list', [PenggunaController::class, 'list'])->name('pengguna/list');
    Route::get('/pengguna/add', [PenggunaController::class, 'getAdd'])->name('pengguna/add');
    Route::post('/pengguna/add', [PenggunaController::class, 'postAdd'])->name('pengguna/add');
    Route::get('/pengguna/edit/{pengguna_id}', [PenggunaController::class, 'getEdit'])->name('pengguna/edit/{pengguna_id}');
    Route::post('/pengguna/edit', [PenggunaController::class, 'postEdit'])->name('pengguna/edit');
    Route::get('/pengguna/delete/{pengguna_id}', [PenggunaController::class, 'getDelete'])->name('pengguna/delete/{pengguna_id}');
});


Route::group(['middleware' => ['verified','check.role:1,2']] , function() {
    Route::get('/alergi/pengguna/list', [AlergiPenggunaController::class, 'list'])->name('alergi/pengguna/list');
    Route::get('/alergi/pengguna/add', [AlergiPenggunaController::class, 'getAdd'])->name('alergi/pengguna/add');
    Route::post('/alergi/pengguna/add', [AlergiPenggunaController::class, 'postAdd'])->name('alergi/pengguna/add');
    Route::get('/alergi/pengguna/edit/{alergi_id}', [AlergiPenggunaController::class, 'getEdit'])->name('alergi/pengguna/edit/{alergi_id}');
    Route::post('/alergi/pengguna/edit', [AlergiPenggunaController::class, 'postEdit'])->name('alergi/pengguna/edit');
    Route::get('/alergi/pengguna/delete/{alergi_id}', [AlergiPenggunaController::class, 'getDelete'])->name('alergi/pengguna/delete/{alergi_id}');
});


Route::group(['middleware' => ['verified','check.role:3,4,5']] , function() {
    Route::get('/alergi/list', [AlergiController::class, 'list'])->name('alergi/list');
    Route::get('/alergi/approved/{alergi_id}/{status}', [AlergiController::class, 'approved'])->name('alergi/approved/{alergi_id}/{status}');
});
