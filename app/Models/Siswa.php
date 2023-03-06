<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp',
    ];

    public function Spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
