<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'Admin',
            'nama_petugas' => 'Admin',
            'level_id' => '1',
            'password' => '$2y$10$XjXCLOdE8qYiX4Di1GAmbe.m66xh3uWNip6r.gJsdZQDK6nvyUAoK'
        ];
    }
}
