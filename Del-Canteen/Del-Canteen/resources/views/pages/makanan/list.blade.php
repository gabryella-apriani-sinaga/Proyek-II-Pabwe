@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Kelola Makanan</h1>
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
                        <a href="{{ route('makanan/add') }}" class="btn btn-primary">Tambah</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td class="font-weight-bold">Waktu</td>
                                <td class="font-weight-bold">Tanggal</td>
                                <td class="font-weight-bold">Tindakan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $f)
                            <tr>
                                <td>
                                    {{ $f->nama }} <br>
                                    <img src="{{ $f->foto }}" style="height: 100px" alt="">
                                </td>
                                <td>
                                    {{ $f->waktu }}
                                </td>
                                <td>
                                    {{ date("d F Y", strtotime($f->tanggal)) }}
                                </td>
                                <td>
                                    <a href="{{ route('makanan/edit/{makanan_id}', ['makanan_id'=>$f->id]) }}" class="btn btn-warning">Ubah</a>
                                    <a href="{{ route('makanan/delete/{makanan_id}', ['makanan_id'=>$f->id]) }}" onclick="return confirm('Yakin ingin menghapus menu makanan ini?')" class="btn btn-danger">Hapus</a>
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
