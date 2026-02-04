<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kebun;

class KebunSeeder extends Seeder
{
    public function run(): void
    {
        // Cetak 50 data kebun baru
        Kebun::factory(50)->create();
    }
}