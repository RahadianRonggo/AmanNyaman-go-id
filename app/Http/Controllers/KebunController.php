<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
use Illuminate\Support\Facades\Auth;

class KebunController extends Controller
{
    // ==========================================
    // 1. DASHBOARD & LOGIKA PASAR UTAMA
    // ==========================================
    public function index()
    {
        // Data Dummy untuk Dashboard
        $marketData = [
            ['name' => 'TRK-JBR', 'price' => '1.650.000', 'change' => 5.2, 'trend' => 'up'],
            ['name' => 'TANI-BAL', 'price' => '480.000', 'change' => -2.1, 'trend' => 'down'],
            ['name' => 'KBN-SMT', 'price' => '8.200.000', 'change' => 1.5, 'trend' => 'up'],
            ['name' => 'TRK-NTB', 'price' => '2.100.000', 'change' => -0.5, 'trend' => 'down'],
        ];
        
        // Data Chart Statis Dashboard
        $chartLabels = ['09:00', '10:00', '11:00', '12:00', '13:00'];
        $chartValues = [7100, 7150, 7120, 7080, 7241];

        // Data Produk Dummy (Biar tidak error di loop view)
        $semuaData = collect([]); 
        $pertanian = collect([]);
        $peternakan = collect([]);
        $perkebunan = collect([]);

        // Cek jika tabel Kebun ada isinya (Opsional)
        try {
            $semuaData = Kebun::latest()->get();
            $pertanian = $semuaData->where('kategori', 'pertanian');
            $peternakan = $semuaData->where('kategori', 'peternakan');
            $perkebunan = $semuaData->where('kategori', 'perkebunan');
        } catch (\Exception $e) {
            // Abaikan jika tabel belum ada
        }

        return view('welcome', compact('semuaData', 'pertanian', 'peternakan', 'perkebunan', 'marketData', 'chartLabels', 'chartValues'));
    }

    // ==========================================
    // 2. FITUR TRADING (GAME BINOMO STYLE) ⚡
    // ==========================================
    public function trading()
    {
        return view('kebun.trading');
    }

    public function prosesTrading(Request $request)
    {
        // Validasi
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'hasil' => 'required|in:win,loss' // Menerima status dari JS Frontend
        ]);

        $bet = $request->amount;
        $hasil = $request->hasil;

        if ($hasil == 'win') {
            $profit = $bet * 0.8; // Profit 80%
            // Di sistem asli, disini kita update database saldo user
            return back()->with('success', 'PROFIT! Tebakan Jitu. Saldo bertambah Rp ' . number_format($profit));
        } else {
            return back()->with('error', 'LOSS! Pasar berlawanan. Saldo berkurang Rp ' . number_format($bet));
        }
    }

    // ==========================================
    // 3. FITUR PENDUKUNG LAINNYA
    // ==========================================
    public function portfolio() { return view('kebun.portfolio', ['myStocks' => []]); }
    public function wallet() { return view('kebun.wallet'); }
    public function akun() { return view('kebun.account'); }
    public function order() { return redirect()->back(); }
    public function berita() { return redirect()->back(); }

    // Transaksi
    public function show($id) { return view('kebun.show'); }
    public function checkout($id) { return view('kebun.checkout'); }
    public function prosesBayar(Request $request, $id) { return redirect()->route('kebun.sukses'); }
}