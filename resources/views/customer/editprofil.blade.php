@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profil</h1>
    </div>

    <form action="{{ route('nasabah-saveedit', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="edit">
        
            <div class="text-end mb-3">
                <a type="button" class="btn btn-outline-danger btn-sm" href="{{ route('dashboard') }}">Back</a>
                <button type="submit" class="btn btn-outline-primary btn-sm">Save Edit</button>
            </div>

            <div class="mb-3 new-text">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" value="{{$user->name}}">
                @error('nama')
                    <div class="alert alert-danger">Check Again</div>
                @enderror
            </div>

            <div class="mb-3 new-text">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" value="{{$user->alamat}}">
                @error('alamat')
                    <div class="alert alert-danger">Check Again</div>
                @enderror
            </div>

            <div class="mb-3 new-text">
                <label for="no_ktp" class="form-label">Nomor Kartu Tanda Penduduk</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan Nomor KTP Anda " value="{{$user->no_ktp}}">
                @error('no_ktp')
                    <div class="alert alert-danger">Check Again</div>
                @enderror
            </div>


            <div class="mb-3 new-text">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" value="{{$user->email}}">
                @error('email')
                    <div class="alert alert-danger">Check Again</div>
                @enderror
            </div>

        </div>
    </form>
</div>
@endsection