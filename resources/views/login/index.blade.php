@extends('main')

@section('css')
<style>  
    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-color: skyblue;
    }

    .form-signin input[type="password"] {
        margin-bottom: 5px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-color: skyblue;
    }

    label{
        color: grey;
    }

    #main{
        /* border-radius: 10px; */
        /* background-image: url("/img/bg-3.jpg"); */
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
        background-image: url("/img/bg-11.jpg");
        /* background-color: black; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 100%;
        height: 480px;
        margin:  auto;
        padding: 10px;
    }

    .input::after{
        content: " *";
        color: red;
        display: inline;
    }

    .info::before{
        content: "* ";
        color: red;
        display: inline;
    }

    #head{
        text-shadow: 1px 1px 2px white, 0 0 1px black, 0 0 5px white;
    }
</style>
@endsection

@section('container')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div id="outer">
                <div id="main">
                    <h2 id="head" class="my-2 text-center">Sign In</h2>
                    <h4 id="head" class="mb-3 text-center">with your E-mail</h4>

                    {{-- Alert (Success Registing) --}}
                    @if (session()->has('true'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('true') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    {{-- Alert (Wrong Email or Pass) --}}
                    @if (session()->has('false'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('false') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <main class="form-signin">
                        <form action="{{ route('ceklogin') }}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                <label class="input" for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <label class="input" for="password">Password</label>
                            </div>

                            <div class="mb-2">
                                <input type="checkbox" onclick="togglePass()">Show Password
                            </div>

                            <small class="info" style="font-weight:600;">
                                Required Field
                            </small>

                            <div class="d-grid gap-2 my-3">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>

                        <small class="d-block text-center mt-3">
                            Belum Terdaftar? Klik 
                            <a href="{{ route('register') }}" style="color: black;">Di Sini</a> 
                            untuk Daftar
                        </small>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function togglePass(){
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>
@endsection