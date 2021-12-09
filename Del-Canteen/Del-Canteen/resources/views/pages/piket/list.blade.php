@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Jadwal Piket</h1>
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
                        @if(in_array($user->role, [2,5]))
                        <a href="{{ route('piket/kantin/add') }}" class="btn btn-primary">Tambah Lokasi</a>
                        <a href="{{ route('piket/petugas/add') }}" class="btn btn-primary">Tambah Petugas</a>
                        @endif
                    </div>

                    @foreach($kantin as $k)
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>{{ $k->nama }} (Lantai {{ $k->lantai }})</h4>
                                </div>
                                <div>
                                    @if(in_array($user->role, [2,5]))
                                    <a href="{{ route('piket/kantin/edit/{kantin_id}', ['kantin_id'=>$k->id]) }}" class="btn btn-warning">Ubah</a>
                                    <a href="{{ route('piket/kantin/delete/{kantin_id}', ['kantin_id'=>$k->id]) }}" onclick="return confirm('Yakin ingin menghapus lokasi kantin ini?')" class="btn btn-danger">Hapus</a>
                                    @endif
                                </div>
                            </div>

                            <br>

                            @foreach($k->hari as $h)
                                <h5>{{ $h->hari }}</h5>


                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td class="font-weight-bold">NIM</td>
                                            <td class="font-weight-bold">Nama</td>
                                            @if(in_array($user->role, [2,5]))
                                                <td class="font-weight-bold">Tindakan</td>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($h->users as $u)
                                        <tr>
                                            <td>
                                                {{ $u->nim }}
                                            </td>
                                            <td>
                                                {{ $u->nama }}
                                            </td>

                                            @if(in_array($user->role, [2,5]))
                                                <td>
                                                    <a href="{{ route('piket/petugas/edit/{user_id}/{kantin_id}', ['user_id'=>$u->id, 'kantin_id'=>$k->id]) }}" class="btn btn-warning">Ubah</a>
                                                    <a href="{{ route('piket/petugas/delete/{user_id}/{kantin_id}', ['user_id'=>$u->id, 'kantin_id'=>$k->id]) }}" onclick="return confirm('Yakin ingin menghapus data petugas piket ini?')" class="btn btn-danger">Hapus</a>
                                                </td>
                                            @endif

                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>




                            @endforeach




                        </div>
                    </div>
                    @endforeach


                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </section>
    </div>
@endsection
