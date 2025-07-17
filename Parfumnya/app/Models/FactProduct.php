<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactProduk extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse'; // Koneksi ke data warehouse
    protected $table = 'fact_produk'; // Nama tabel
    protected $primaryKey = 'sk_produk'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps

    // Relasi ke DimMaterial
    public function produk()
    {
        return $this->belongsTo(DimProduk::class, 'sk_produk', 'sk_produk');
    }
}
