<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kebuns', function (Blueprint $table) {
            $table->id();
            
            // --- INI KOLOM BARU (KODE SAHAM) ---
            $table->string('kode')->unique(); // Contoh: TANI-JBR, TRK-PAPUA
            // -----------------------------------

            $table->string('nama');
            $table->string('lokasi');
            $table->bigInteger('harga'); // Pakai BigInteger biar aman angka besar
            $table->integer('roi');
            $table->integer('durasi');
            $table->string('gambar');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kebuns');
    }
};