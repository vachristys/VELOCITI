<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkir';

    protected $fillable = [
        'plat_nomor', 'jenis_kendaraan', 'waktu_masuk', 'waktu_keluar', 'durasi', 'biaya', 'status'
    ];
}