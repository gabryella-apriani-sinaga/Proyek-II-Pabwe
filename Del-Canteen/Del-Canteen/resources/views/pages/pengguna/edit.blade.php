@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Ubah Data Pengguna</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">

                    <form method="POST" action="{{ route('pengguna/edit') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ $pengguna->id }}">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input value="{{ $pengguna->nama }}" type="text" name="nama" class="form-control" id="nama" required>
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ $pengguna->email }}" type="email" name="email" class="form-control" id="email" required>
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="role">Status</label>
                            <select name="role" id="role" class="form-control" required>
                                @if($pengguna->role == 1 || $pengguna->role == 2)
                                <option {{ $pengguna->role == 1 ? 'selected' : '' }} value="1">Mahasiswa</option>
                                <option {{ $pengguna->role == 2 ? 'selected' : '' }} value="2">Ketertiban</option>
                                @endif
                                <option {{ $pengguna->role == 3 ? 'selected' : '' }} value="3">Keasramaan</option>
                                <option {{ $pengguna->role == 4 ? 'selected' : '' }} value="4">Staff Kantin</option>
                                <option {{ $pengguna->role == 5 ? 'selected' : '' }} value="5">Admin</option>
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
