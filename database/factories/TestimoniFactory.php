<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimoniFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name('id_ID'),
            'profesi' => $this->faker->randomElement(['Investor', 'Mahasiswa', 'PNS', 'Wiraswasta', 'Ibu Rumah Tangga']),
            'isi_pesan' => $this->faker->randomElement([
                "CuanTani mantap! Panen tepat waktu.",
                "Passive income yang nyata, terima kasih.",
                "Awalnya ragu tapi ternyata amanah.",
                "Sangat membantu petani lokal.",
                "Platform investasi terbaik tahun ini!"
            ]),
            'rating' => $this->faker->numberBetween(4, 5),
        ];
    }
}