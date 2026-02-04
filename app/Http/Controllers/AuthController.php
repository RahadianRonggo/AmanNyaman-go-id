<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// 👇 INI PERBAIKANNYA (Library Auth & Hash wajib dipanggil)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ==========================================================
    // 1. FITUR REGISTER (DAFTAR AKUN BARU)
    // ==========================================================
    
    // Menampilkan Halaman Register
    public function showRegister()
    {
        // Pastikan Anda punya file: resources/views/auth/register.blade.php
        return view('auth.register');
    }

    // Memproses Data Register
    public function prosesRegister(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Simpan ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-enkripsi
            'role' => 'investor', // Default role
            'saldo' => 120500000 // Bonus saldo awal (Biar langsung bisa trading!)
        ]);

        return redirect()->route('login')->with('success', 'Siap Ndan! Akun berhasil dibuat. Silakan Login.');
    }

    // ==========================================================
    // 2. FITUR LOGIN (MASUK SISTEM) - YANG TADINYA ERROR
    // ==========================================================

    // Menampilkan Halaman Login
    public function showLogin()
    {
        // Pastikan Anda punya file: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // Memproses Login
    public function login(Request $request)
    {
        // Validasi Input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek Apakah Email & Password Benar?
        // (Disini error sebelumnya terjadi karena kurang "use Auth")
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Jika berhasil, lempar ke halaman Home (Dashboard)
            return redirect()->route('home')->with('success', 'Lapor! Login Berhasil. Selamat bertugas.');
        }

        // Jika salah, kembalikan ke halaman login
        return back()->with('error', 'Login Gagal! Email atau Password salah, Ndan.');
    }

    // ==========================================================
    // 3. FITUR LOGOUT (KELUAR)
    // ==========================================================
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil Logout. Sampai jumpa lagi!');
    }
}