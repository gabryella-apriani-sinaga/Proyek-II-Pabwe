@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Tambah Lokasi Kantin</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <form method="POST" action="{{ route('piket/kantin/add') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama kantin</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                            <small class="form-text text-muted"></small>
                        </div>


                        <div class="form-group">
                            <label for="lantai">Lantai</label>
                            <input type="required" name="lantai" class="form-control" id="lantai" required>
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
