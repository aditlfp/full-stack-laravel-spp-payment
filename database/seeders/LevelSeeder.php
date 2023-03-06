<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['admin', 'petugas', 'siswa'];
        foreach($arr as $data => $value){
            $role = new Level();
            $role->name = $value;
            $role->save();
        }
    }
}
