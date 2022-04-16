@extends('main')

@section('header', 'Detail Nasabah')

@section('container')
<div class="flex-container">
<div class="shadow-lg p-3 mb-3 bg-body rounded">
    <center><img src="{{ asset ('storage/' . $nasabah->foto_nasabah) }}" style="width:200px;height:200px;" border="3" class="img-thumbnail rounded-circle"></center><br>
    <div class="mb-3 new-text">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"value="{{$nasabah->nama}}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$nasabah->alamat}}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="no_ktp" class="form-label">Nomor Kartu Tanda Penduduk</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" " value="{{$nasabah->no_ktp}}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="telepon" class="form-label">Nomor Telephone</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{$nasabah->telepon}}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$nasabah->email}}" readonly>
    </div>

    <div class="d-grid gap-2 mb-3">
        <a type="button" class="btn btn-outline-danger" href="{{ route('nasabah-list') }}">Back</a>
    </div>
    
</div>
</div>
@endsection