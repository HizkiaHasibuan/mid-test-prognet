<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamera',
        'deskripsi',
        'gambar',
        'harga',
        'status',
        'isDelete'
    ];

    public function transaksi(){
        return $this->belongsTo(transaksi::class);
    }
}
