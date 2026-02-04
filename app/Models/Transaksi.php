<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // PENTING: Panggil Pabrik
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory; // PENTING: Pasang Stempel Pabrik

    protected $guarded = ['id'];
}