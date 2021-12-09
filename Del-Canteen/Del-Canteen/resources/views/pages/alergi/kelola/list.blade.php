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

                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">Judul</td>
                                <td class="font-weight-bold">Total Penderita</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alergi as $a)
                            <tr>
                                <td>
                                    {{ $a->judul }}
                                </td>
                                <td>
                                    {{ $a->total }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @if(in_array($user->role, [3, 5]))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="font-weight-bold">Judul</td>
                                <td class="font-weight-bold">Status</td>
                                <td class="font-weight-bold">Tindakan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $a)
                            <tr>
                                <td>
                                    {{ $a->judul }}
                                </td>
                                <td>

                                    @if($a->user_approved)
                                        Diterima
                                    @else
                                        Menunggu
                                    @endif

                                </td>
                                <td>
                                    <a target="_blank" href="{{ $a->file }}" class="btn btn-primary">Lihat File</a>
                                    <a href="{{ route('alergi/approved/{alergi_id}/{status}', ['alergi_id'=>$a->id, 'status'=>1]) }}" onclick="return confirm('Yakin ingin menerima data alergi ini?')" class="btn btn-success">Terima</a>
                                    <a href="{{ route('alergi/approved/{alergi_id}/{status}', ['alergi_id'=>$a->id, 'status'=>0]) }}" onclick="return confirm('Yakin ingin menolak data alergi ini?')" class="btn btn-danger">Tolak</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif

                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </section>
    </div>
@endsection
