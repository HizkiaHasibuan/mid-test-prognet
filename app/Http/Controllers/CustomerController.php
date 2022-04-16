<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function dashboard(){
        return view('dashboard.layouts.index');
    }

    public function index(){
        return view('register.index');
    }

    public function savenewcustomer(Request $req){
        $req->validate([
            'nama' => 'required|min:3',
            'no_ktp' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:16',
            // 'password_confirm' => 'required|same:password'
        ]);

        $hashpass = bcrypt($req['password']); 
        // return $req;
        User::create([
            'name'=> $req->nama,
            'no_ktp'=> $req->no_ktp,
            'alamat'       => $req->alamat,
            'email'      => $req->email,
            'password' => $hashpass
        ]);

        return redirect()->route('login'); //->with('true', 'Berhasil Mendaftar! Silahkan Masuk');
    }
}