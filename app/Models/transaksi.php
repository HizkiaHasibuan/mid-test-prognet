<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_kamera',
        'tgl_pinjam',
        'tgl_kembali',
        'bukti_pembayaran',
        'status',
    ];

    public function camera(){
        return $this->belongsTo(Camera::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
