<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'ktp_expiry',
        'shdk',
        'request_id',  // Relasi dengan tabel request
    ];

    /**
     * Relasi ke tabel moving_comes_in_one_village
     */
    public function movingComesInOneVillage()
    {
        return $this->hasOne(MovingComesInOneVillage::class);  // Satu keluarga hanya bisa memiliki satu surat pindah datang satu desa
    }
}
