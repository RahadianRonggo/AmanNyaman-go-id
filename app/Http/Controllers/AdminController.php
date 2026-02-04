<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProyek = Kebun::count();
        $totalInvestasi = Transaksi::sum('jumlah');
        $pendapatanAplikasi = $totalInvestasi * 0.05; 

        $transaksiTerbaru = Transaksi::latest()->take(10)->get(); 
        $semuaProyek = Kebun::latest()->get();

        return view('admin_dashboard', compact(
            'totalProyek', 'totalInvestasi', 'pendapatanAplikasi', 
            'transaksiTerbaru', 'semuaProyek'
        ));
    }

    // --- FITUR BARU: INPUT TRANSAKSI ---
    
    // 1. Tampilkan Formulir
    public function createTransaksi()
    {
        // Kirim daftar proyek biar admin tinggal pilih (dropdown)
        $daftarProyek = Kebun::all();
        return view('tambah_transaksi', compact('daftarProyek'));
    }

    // 2. Simpan Uang Masuk
    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'nama_investor' => 'required',
            'proyek_tujuan' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Transaksi::create([
            'nama_investor' => $request->nama_investor,
            'proyek_tujuan' => $request->proyek_tujuan,
            'jumlah' => $request->jumlah,
            'status' => 'Lunas', // Admin input manual pasti sudah lunas
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Saldo Masuk! Omset Bertambah 💰');
    }
}