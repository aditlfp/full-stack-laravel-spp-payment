<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kelas::factory()->create([
            'nama_kelas' => 'X',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => 'XI',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => 'XII',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);
    }
}
