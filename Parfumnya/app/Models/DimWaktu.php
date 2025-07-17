<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    protected $table = 'dim_waktu';
    protected $primaryKey = 'sk_waktu';
    public $timestamps = false;

    protected $fillable = ['Tanggal_int', 'Bulan', 'Tahun', 'Tanggal'];
}
