@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profil</h1>
</div>

@if (session()->has('true'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('true') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-lg-8">
@if (auth()->user()->isAdmin != 1)
    <div class="d-flex justify-content-end my-3">
        {{-- <a type="button" class="btn btn-primary btn-sm" href="{{ route('user-edit-profil', auth()->user()->id) }}"><span data-feather="edit"></span> Edit</a> --}}
        <a type="button" class="btn btn-primary btn-sm" href="{{ route('user-edit-profil', auth()->user()->id) }}"><span data-feather="edit"></span> Edit Profil</a>
    </div>

    <div class="mb-3 new-text">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"value="{{ auth()->user()->name }}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea type="text" class="form-control" id="alamat" name="alamat" readonly>{{ auth()->user()->alamat }}</textarea>
    </div>

    <div class="mb-3 new-text">
        <label for="no_ktp" class="form-label">Nomor Kartu Tanda Penduduk</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" " value="{{ auth()->user()->no_ktp }}" readonly>
    </div>

    <div class="mb-5 new-text">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
    </div>
@else
    <div class="d-flex justify-content-end my-3">
        <a type="button" class="btn btn-primary btn-sm" href="#"><span data-feather="edit"></span> Edit</a>
    </div>

    <div class="mb-3 new-text">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"value="{{ auth()->user()->name }}" readonly>
    </div>

    <div class="mb-3 new-text">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea type="text" class="form-control" id="alamat" name="alamat" readonly>{{ auth()->user()->alamat }}</textarea>
    </div>

    <div class="mb-3 new-text">
        <label for="no_ktp" class="form-label">Nomor Kartu Tanda Penduduk</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" " value="{{ auth()->user()->no_ktp }}" readonly>
    </div>

    <div class="mb-5 new-text">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
    </div>
@endif
</div>
@endsection