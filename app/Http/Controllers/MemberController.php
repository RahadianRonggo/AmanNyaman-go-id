<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController; // Anti-Error Class

class MemberController extends BaseController
{
    // FUNGSI 1: DOMPET (Portfolio)
    public function index()
    {
        // Data Simulasi
        $user = ['name' => 'Sultan Andara', 'saldo_cash' => 5400000];
        $portfolio = [
            ['nama' => 'Kebun Durian Montong', 'lot' => 10, 'harga_sekarang' => 2750000, 'persen' => 10.0, 'status' => 'up', 'icon' => '🌳'],
            ['nama' => 'Ternak Sapi Limosin', 'lot' => 5, 'harga_sekarang' => 15200000, 'persen' => 1.3, 'status' => 'up', 'icon' => '🐮']
        ];
        
        // Hitung Aset
        $totalAsetInvestasi = 0;
        foreach($portfolio as $p) $totalAsetInvestasi += $p['lot'] * $p['harga_sekarang'];
        $totalEquity = $user['saldo_cash'] + $totalAsetInvestasi;

        // Data Grafik
        $chartLabels = collect($portfolio)->pluck('nama');
        $chartValues = collect($portfolio)->map(fn($p) => $p['lot'] * $p['harga_sekarang']);

        return view('member_portfolio', compact('user', 'portfolio', 'totalEquity', 'totalAsetInvestasi', 'chartLabels', 'chartValues'));
    }

    // FUNGSI 2: AKUN (Profile)
    public function profile()
    {
        $user = [
            'name' => 'Sultan Andara',
            'email' => 'sultan@cuantani.id',
            'hp' => '0812-3456-7890',
            'join_date' => '12 Jan 2026',
            'verified' => true,
        ];

        // Logika Level
        $totalAset = 158000000;
        if ($totalAset > 100000000) {
            $level = 'Sultan Tani'; $badge = 'Gold'; $progress = 100; $nextLevel = 'Pemilik Negara'; $target = 0;
        } else {
            $level = 'Petani Pemula'; $badge = 'Bronze'; $progress = 30; $nextLevel = 'Juragan'; $target = 50000000;
        }

        return view('member_profile', compact('user', 'level', 'badge', 'progress', 'nextLevel', 'target', 'totalAset'));
    }
}