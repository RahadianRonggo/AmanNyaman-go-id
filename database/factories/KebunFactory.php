<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KebunFactory extends Factory
{
    public function definition(): array
    {
        $jenis = ['Kebun Durian', 'Sawah Padi', 'Ladang Jagung', 'Tambak Lele', 'Kebun Sawit', 'Kebun Cabai', 'Ternak Sapi', 'Kebun Kopi'];
        $kota = ['Jakarta', 'Bogor', 'Bandung', 'Semarang', 'Solo', 'Yogyakarta', 'Surabaya', 'Malang', 'Medan', 'Padang', 'Palembang', 'Makassar', 'Denpasar', 'Balikpapan'];

        // 1. Pilih Jenis & Kota
        $pilihJenis = $this->faker->randomElement($jenis);
        $pilihKota = $this->faker->randomElement($kota);

        // 2. KAMUS PENTERJEMAH (Indo -> Inggris untuk cari gambar)
        $kamusGambar = [
            'Kebun Durian' => 'durian',
            'Sawah Padi' => 'ricefield',
            'Ladang Jagung' => 'cornfield',
            'Tambak Lele' => 'catfish',
            'Kebun Sawit' => 'palm-oil',
            'Kebun Cabai' => 'chili-plant',
            'Ternak Sapi' => 'cow',
            'Kebun Kopi' => 'coffee-plant'
        ];
        
        // Ambil kata kunci inggrisnya, misal: 'cow'
        $keyword = $kamusGambar[$pilihJenis] ?? 'farm';

        // 3. Deskripsi Marketing
        $daftarDeskripsi = [
            "Proyek ini dikelola oleh kelompok tani berpengalaman dengan metode pertanian organik modern. Hasil panen ditargetkan untuk menyuplai supermarket premium.",
            "Investasi strategis di lahan subur seluas 2 hektar. Fokus utama kami adalah kualitas ekspor dengan standar internasional.",
            "Program kemitraan ini bertujuan memberdayakan petani lokal agar terbebas dari jeratan tengkulak dengan teknologi IoT.",
            "Peluang emas bagi Anda yang ingin memiliki pasif income dari sektor ketahanan pangan nasional.",
            "Menggabungkan kearifan lokal dengan teknologi pemupukan terbaru. Lahan ini telah melalui uji kelayakan tanah Grade A."
        ];

        return [
            'nama_proyek' => $pilihJenis . ' ' . $pilihKota,
            'lokasi' => $pilihKota . ', Indonesia',
            'target_dana' => $this->faker->numberBetween(10, 500) * 1000000,
            'roi' => $this->faker->numberBetween(10, 30),
            'durasi' => $this->faker->randomElement([3, 6, 12, 24]),
            'deskripsi' => $this->faker->randomElement($daftarDeskripsi),
            
            // 4. GENERATE URL GAMBAR OTOMATIS (Bukan file lokal)
            // Format: https://loremflickr.com/640/480/keyword
            'foto' => "https://loremflickr.com/640/480/$keyword?random=" . $this->faker->numberBetween(1, 1000)
        ];
    }
}