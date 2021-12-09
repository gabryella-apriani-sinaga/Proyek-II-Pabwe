@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Tambah Petugas Piket</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <form method="POST" action="{{ route('piket/petugas/add') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="user_id">Petugas</label>
                            <input list="petugas" name="user_id" id="user_id" class="form-control" required>
                            <datalist id="petugas">
                                @foreach($petugas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->nim }})</option>
                                @endforeach
                            </datalist>
                            <small class="form-text text-muted"></small>
                        </div>


                        <div class="form-group">
                            <label for="kantin_id">Lokasi Kantin</label>
                            <select name="kantin_id" id="kantin_id" class="form-control" required>
                                @foreach($kantin as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }} (Lantai {{ $k->lantai }})</option>
                                @endforeach

                            </select>
                            <small class="form-text text-muted"></small>
                        </div>


                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control" required>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumaat</option>
                            </select>
                            <small class="form-text text-muted"></small>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </section>
    </div>
@endsection
