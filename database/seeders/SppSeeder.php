<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Spp::factory()->create([
            'tahun' => now()->toDateString(),
            'nominal' => '170000',
        ]);

        \App\Models\Spp::factory()->create([
            'tahun' => now()->toDateString(),
            'nominal' => '180000',
        ]);
    }
}
