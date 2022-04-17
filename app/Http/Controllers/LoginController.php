<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // $cekAdmin=$cekAdmin->isAdmin;
        //     if($cekAdmin=1){
        //         return redirect()->intended('/dashboardAdmin', compact('cekAdmin'));
        //     }

        return back()->with('false', 'Gagal Masuk, Email atau Password Tidak Sesuai');
    }

    public function signout(Request $req){
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route('login');
    }
}
