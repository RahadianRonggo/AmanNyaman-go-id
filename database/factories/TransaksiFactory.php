<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_investor' => $this->faker->name(),
            'proyek_tujuan' => $this->faker->randomElement(['Kebun Durian Montong', 'Ternak Sapi Limosin', 'Sawah Organik Cianjur', 'Tambak Udang Vaname']),
            'jumlah' => $this->faker->numberBetween(1000000, 50000000), // 1jt - 50jt
            'status' => 'Lunas',
            'tanggal' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}