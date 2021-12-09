@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Data Alergi</h1>
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
                        <a href="{{ route('alergi/pengguna/add') }}" class="btn btn-primary">Tambah</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">Judul</td>
                                <td class="font-weight-bold">Status</td>
                                <td class="font-weight-bold">Tindakan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alergi as $a)
                            <tr>
                                <td>
                                    {{ $a->judul }}
                                </td>
                                <td>

                                        @if($a->status == 1)
                                        Diterima
                                        @elseif($a->status == 0)
                                        Menunggu
                                        @else
                                        Ditolak
                                        @endif

                                </td>
                                <td>
                                    <a target="_blank" href="{{ $a->file }}" class="btn btn-primary">Lihat File</a>
                                    <a href="{{ route('alergi/pengguna/edit/{alergi_id}', ['alergi_id'=>$a->id]) }}" class="btn btn-warning">Ubah</a>
                                    <a href="{{ route('alergi/pengguna/delete/{alergi_id}', ['alergi_id'=>$a->id]) }}" onclick="return confirm('Yakin ingin menghapus data alergi ini?')" class="btn btn-danger">Hapus</a>
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
