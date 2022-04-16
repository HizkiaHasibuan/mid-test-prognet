@extends('main')

@section('css')
<style>  
  .form-signup .new-text:focus-within {
    z-index: 2;
  }
  
  .form-signup input{
    border-radius: 0;
    margin-bottom: -1px;
    /* background-color: black;
    color: whitesmoke; */
    border-color: skyblue;
  }

  label{
    color: grey;
  }

  #main{
        /* border-radius: 10px; */
        /* background-image: url("/img/bg-4.jpg"); */
        /* background-color: black; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 70%;
        height: 70%;
        margin:  auto;
        padding: 10px;
    }

    #outer{
        border-radius: 10px;
        background-image: url("/img/bg-12.jpg");
        /* background-color: black; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 100%;
        height: 100%;
        margin:  auto;
        padding: 10px;
    }

    .input::after{
        content: " *";
        color: red;
        display: inline;
    }

    .info::before{
        content: " *";
        color: red;
        display: inline;
    }

    #head{
        text-shadow: 1px 1px 2px white, 0 0 1px black, 0 0 5px white;
    }
</style>
@endsection

@section('container')
<div class="container mt-3">
<div class="row justify-content-center">
<div class="col-lg-7">
    <div id="outer">
    <div id="main">
        <h2 id="head" class="my-3 text-center">Sign Up</h2>
        <main class="form-signup">
        <form action="{{ route('savenewcustomer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="new">
            <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Anda" value="{{ old('nama') }}" autofocus>
                <label class="input" for="nama">Nama Lengkap</label>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-floating">
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" value="{{ old('alamat') }}">
                <label class="input" for="alamat">Alamat Domisili</label>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-floating">
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" placeholder="Masukkan Nomor KTP Anda " value="{{ old('no_ktp') }}">
                <label class="input" for="no_ktp">Nomor KTP</label>
                @error('no_ktp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label class="input" for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password Anda" value="{{ old('password') }}">
                <label class="input" for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-floating">
                <input type="password" class="form-control rounded-bottom @error('password_confirm') is-invalid @enderror" id="password_confirm" name="password_confirm" placeholder="Masukkan Kembali Password Anda">
                <label class="input" for="password_confirm">Konfirmasi Password</label>
                @error('password_confirm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <small class="info" style="font-weight: 600; color: white">Required Field</small>
        
            <div class="d-grid gap-2 my-3">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            <small class="d-block text-center mb-2">Sudah Terdaftar? Klik <a href="{{ route('login') }}" style="color: black;">Di Sini </a>untuk Masuk</small>
            </div>
        </form>
        </main>
    </div>
    </div>
</div>
<small class="mb-3"></small>
</div>
</div>
@endsection