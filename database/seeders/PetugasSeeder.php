<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::factory()->create([
            'username' => 'Admin',
            'nama_petugas' => 'Admin',
            'level_id' => '1',
            'password' => '$2y$10$XjXCLOdE8qYiX4Di1GAmbe.m66xh3uWNip6r.gJsdZQDK6nvyUAoK'
        ]);

        \App\Models\Petugas::factory()->create([
            'username' => 'Petugas 1',
            'nama_petugas' => 'Petugas 1',
            'level_id' => '2',
            'password' => '$2y$10$XjXCLOdE8qYiX4Di1GAmbe.m66xh3uWNip6r.gJsdZQDK6nvyUAoK'
        ]);

        \App\Models\Petugas::factory()->create([
            'username' => 'Siswa 1',
            'nama_petugas' => 'bukan-petugas',
            'level_id' => '3',
            'password' => '$2y$10$XjXCLOdE8qYiX4Di1GAmbe.m66xh3uWNip6r.gJsdZQDK6nvyUAoK'
        ]);
    }
}
