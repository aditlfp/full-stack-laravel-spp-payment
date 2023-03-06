<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['pending', 'failure', 'success', 'process'];
        foreach($arr as $data => $value){
            $status = new Status();
            $status->name = $value;
            $status->save();
        }
    }
}
