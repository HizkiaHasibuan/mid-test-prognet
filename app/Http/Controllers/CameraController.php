<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CameraController extends Controller
{
    public function index(){
        return view('camera.newCamera');
    }

    public function savenewcamera(Request $request){
        
        $request->validate([
            'camera' => 'required|min:1|alpha',
            'description' => 'required|min:1',
            'harga' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $gambar=$request->file('image')->store('picture');
        
        Camera::create([
            'kamera' => $request->camera,
            'deskripsi' => $request->description,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);
        return redirect()->route ('hallo');//listcamera
    }
}
