<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'nama_petugas',
        'level_id',
        'img',
        'alamat',
        'no_telp',
        'views',
        'last_seen'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'last_seen',
    ];

    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function isOnline()
    {
        return $this->last_senn && $this->last_seen->diffInMinutes() < 5;
    }
}
