<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_pay',
        'siswa_id',
        'pembayaran_id',
        'spp_id',
        'img'
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }

    public function Spp()
    {
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }
}
