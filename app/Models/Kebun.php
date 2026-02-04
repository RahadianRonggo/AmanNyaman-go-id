<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    // Pastikan 'kode' ada di sini supaya bisa diisi otomatis!
    protected $fillable = [
        'kode',      // <--- WAJIB ADA
        'nama',
        'lokasi',
        'harga',
        'roi',
        'durasi',
        'gambar',
        'kategori',
        'deskripsi'
    ];
}