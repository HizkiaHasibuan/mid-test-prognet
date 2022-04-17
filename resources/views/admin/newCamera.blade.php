@extends('dashboard.layouts.mainAdmin')

@section('container')

    <form action="{{ route ('savenewcamera') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="camera" class="form-label">Nama Kamera</label>
            <input type="text" class="form-control" id="camera" name="camera">
            @error('camera')
                <div class="alert alert-danger">This field is required and must be alphabet</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga">
            @error('harga')
                <div class="alert alert-danger">This field is required and must be numeric</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Input Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Kamera</label>
            <textarea class="form-control" id="description" name="description" rows="10">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">This field is required</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route ('hallo') }}">Back</a>
    </form>
@endsection