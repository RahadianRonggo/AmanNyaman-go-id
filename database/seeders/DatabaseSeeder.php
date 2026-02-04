<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // KITA BUAT SATU AKUN ADMIN SPESIAL
        User::create([
            'name' => 'Komandan Taruna',
            'email' => 'admin@cuantani.com', // INI EMAIL LOGIN
            'password' => Hash::make('siap86'), // INI PASSWORDNYA (Terenkripsi)
            'role' => 'admin',
        ]);
        
        // Buat akun member biasa untuk tes (opsional)
        User::create([
            'name' => 'Investor Pemula',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'member',
        ]);
    }
}