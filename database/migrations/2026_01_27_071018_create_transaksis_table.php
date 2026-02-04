<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_investor'); // Nama Pengirim
            $table->string('proyek_tujuan'); // Beli Sapi / Kebun apa?
            $table->decimal('jumlah', 15, 2); // Uang Masuk (Rp)
            $table->string('status');        // Berhasil/Pending
            $table->date('tanggal');         // Tanggal Transfer
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};