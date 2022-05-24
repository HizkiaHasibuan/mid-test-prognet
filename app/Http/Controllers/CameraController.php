<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\transaksi;

class CameraController extends Controller
{
    public function index(){
        return view('dashboard.layouts.index');
    }
    
    public function newkamera(){
        return view('camera.newCamera');
    }

    public function savenewcamera(Request $request){
        
        $request->validate([
            'camera' => 'required|min:1|alpha',
            'description' => 'required|min:1',
            'harga' => 'required|numeric',
            'image' => 'required|image',
        ]);

        // $gambar=$request->file('image')->store('picture');
        // $gambar=$request->file('image')->store('/public/post-images');
        // return $gambar;
        
        $filename = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        Camera::create([
            'kamera' => $request->camera,
            'deskripsi' => $request->description,
            'harga' => $request->harga,
            'gambar' => $filename
        ]);
        return redirect ()->route ('hallo');
    }

    public function listkamera(){
     
        $kameras = Camera::where('isDelete','=',0)->get();

        return view('camera.listcamera', compact('kameras'));
    }

    public function deletecamera($id){
        $kamera = Camera::find($id);
        $kamera->isDelete = 1;
        $kamera->save();
        return redirect()->route ('dashboard');
    }

    // public function formpesan($id){
    //     $idkamera=Camera::find($id);;
    //     return view('camera.formpesan', compact('idkamera'));
    // }
    public function formpesan($id){
        $camera = Camera::find($id);
        // $kamera_id = $user->id;

        return view('customer.formpesan', compact('camera'));
    }

    public function pesan(Request $request, $id){
        $camera = $id;
        $userId = auth()->user()->id;
        // $request->validate([
        //     'pinjam' => 'required',
        //     'kembali' => 'required',
        //     'image' => 'required|image',
        // ]);

        $filename = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        // return $request;
        transaksi::create([
            'id_user' => $userId,
            'id_kamera' => $camera,
            'tgl_pinjam' => $request->pinjam,
            'tgl_kembali' => $request->kembali,
            'bukti_pembayaran' =>$filename
        ]);
        return redirect()->route ('hallo');
    }

    public function listpesan(){
     
        $pesans = transaksi::where('status','=','pending')->get();

        return view('admin.listpesan', compact('pesans'));
    }

    // public function konfirmasi($id){
    //     // return $id;
    //     $transaksi = transaksi::find($id);
    //     $transaksi->status = 'pinjam';
    //     $transaksi->save();

    //     return redirect()->route('dashboard');        
    // }

    public function confirm($id){
        $up = transaksi::find($id);
        $up->status = 'pinjam';
        $up->save();
        return redirect()->route ('dashboard');
    }

    public function listkameraadmin(){
     
        $kameras = Camera::where('isDelete','=',0)->get();

        return view('admin.listcamera', compact('kameras'));
    }

    public function editkamera($id){
        $user = Camera::find($id);
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
}
