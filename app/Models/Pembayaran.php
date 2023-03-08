<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'id_spp',
        'status_id',
        'keterangan',
        'lain_lain',
        'uang_bayar',
        'jumlah_bayar',
        'kembalian_bayar',
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
    public function Spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
    public function Petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}

