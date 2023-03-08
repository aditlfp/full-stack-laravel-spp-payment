<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'img' => "No Image",
            'nisn' => fake()->unique()->numberBetween(0, 100000),
            'nis' => fake()->unique()->numberBetween(0, 1000000),
            'nama' => fake()->name(),
            'id_kelas' => fake()->numberBetween(1, 3),
            'alamat' => "Jenangan",
            'no_telp' => "Tidak Menambahkan No Telp",
            'id_spp' => fake()->numberBetween(1, 2),
        ];
    }
}
