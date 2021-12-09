@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Kelola Pengguna</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <div class="text-right mb-3">
                        <a href="{{ route('pengguna/add') }}" class="btn btn-primary">Tambah</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td class="font-weight-bold">Email</td>
                                <td class="font-weight-bold">Status</td>
                                <td class="font-weight-bold">Tindakan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $p)
                            <tr>
                                <td>
                                    {{ $p->nama }}
                                </td>
                                <td>
                                    {{ $p->email }}
                                </td>
                                <td>
                                    @switch($p->role)
                                        @case(1)
                                            Mahasiswa
                                            @break
                                        @case(2)
                                            Ketertiban
                                            @break
                                        @case(3)
                                            Kemahasiswaan
                                            @break
                                        @case(4)
                                            Staff Kantin
                                            @break
                                        @case(5)
                                            Admin
                                            @break
                                        @default
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('pengguna/edit/{pengguna_id}', ['pengguna_id'=>$p->id]) }}" class="btn btn-warning">Ubah</a>
                                    <a href="{{ route('pengguna/delete/{pengguna_id}', ['pengguna_id'=>$p->id]) }}" onclick="return confirm('Yakin ingin menghapus data pengguna ini?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </section>
    </div>
@endsection
