@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Ubah Makanan</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <form method="POST" action="{{ route('makanan/edit') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ $makanan->id }}">

                        <div class="form-group">
                            <img src="{{ $makanan->foto }}" style="height: 200px" alt="">
                            <br>
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input value="{{ $makanan->nama }}" type="text" name="nama" class="form-control" id="nama" required>
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <select name="waktu" id="waktu" class="form-control" required>
                                <option {{ ($makanan->waktu == 'Pagi') ? 'selected' : '' }}>Pagi</option>
                                <option {{ ($makanan->waktu == 'Siang') ? 'selected' : '' }}>Siang</option>
                                <option {{ ($makanan->waktu == 'Malam') ? 'selected' : '' }}>Malam</option>
                            </select>
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input value="{{ $makanan->tanggal }}" type="date" name="tanggal" class="form-control" id="tanggal" required>
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
