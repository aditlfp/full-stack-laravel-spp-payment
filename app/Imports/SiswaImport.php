<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'img' => $row['img'],
            'nisn' => $row['nisn'],
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'id_kelas' => $row['id_kelas'],
            'alamat' => $row['alamat'],
            'no_telp' => $row['no_telp'],
            'id_spp' => $row['id_spp'],
        ]);
    }
}
