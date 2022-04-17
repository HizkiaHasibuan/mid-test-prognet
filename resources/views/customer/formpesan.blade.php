@extends('dashboard.layouts.mainAdmin')

@section('container')

    <form action="{{ route ('pesan',$camera->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="camera" class="form-label">Nama Kamera</label>
            <input type="text" class="form-control" id="camera" name="camera" value="{{$camera->kamera}}" readonly>
            @error('camera')
                <div class="alert alert-danger">This field is required and must be alphabet</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="pinjam" name="pinjam">
            @error('pinjam')
                <div class="alert alert-danger">This field is required and must be numeric</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="kembali" name="kembali">
            @error('kembali')
                <div class="alert alert-danger">This field is required and must be numeric</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Bukti pembayaran</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
        <a type="button" class="btn btn-success" href="{{ route ('hallo') }}">Back</a>
    </form>
@endsection