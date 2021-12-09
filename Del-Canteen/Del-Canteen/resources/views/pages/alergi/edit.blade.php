@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Ubah Data Alergi</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <form method="POST" action="{{ route('alergi/pengguna/edit') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ $alergi->id }}">

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" value="{{ $alergi->judul }}" name="judul" class="form-control" id="judul" required>
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="file">File</label> <br>
                            <a href="{{ $alergi->file }}">Lihat File</a>
                            <input type="file" name="file" class="form-control" id="file">
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
