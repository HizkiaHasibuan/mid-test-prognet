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

    public function dashboardAdmin(){
        return view('dashboard.layouts.indexAdmin');
    }
    
    public function profil(){
        return view('customer.profil');
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

    public function editprofil($id){
        $user = User::find($id);
        $pengguna_id = $user->id;

        if ($user->isAdmin == 1) {
            $customer = User::find($pengguna_id);
            return view('customer.editprofil', compact('customer','user'));
        }

        $customer = User::find($pengguna_id);
        return view('customer.editprofil', compact('customer','user'));
    }

    public function saveedit(Request $request, $id){
        $user = User::find($id);
        $pengguna_id = $user->id;

        $request->validate([
            'nama' => 'required|min:1',
            'alamat' => 'required|min:1',
            'no_ktp' => 'required|min:12',
            'email' => 'required',
        ]);

        $user = User::find($pengguna_id);
        $user->name = $request->nama;
        $user->alamat = $request->alamat;
        $user->no_ktp = $request->no_ktp;            
        $user->save();

        return redirect()->route('user-profil')->with('true', 'Berhasil Mengubah Data!');
        
        if ($user->isAdmin == 1) {
            $admin = User::find($pengguna_id);
            }
            $admin->name = $request->nama;
            $admin->alamat = $request->alamat;
            $admin->no_ktp = $request->no_ktp;            
            $admin->save();

            return redirect()->route('user-profil')->with('true', 'Berhasil Mengubah Data!');
        }

        // $admin = User::find($pengguna_id);
        
        // $cstmr->nama = $request->nama;
        // $nasabah->alamat = $request->alamat;
        // $nasabah->no_ktp = $request->no_ktp;
        // $nasabah->telepon = $request->telepon;  
        // $nasabah->save();

        // return redirect()->route('user-profil')->with('true', 'Berhasil Mengubah Data!');
}