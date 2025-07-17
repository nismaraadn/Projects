<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactReproductions extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'fact_reproduksi'; // Nama tabel
    public $timestamps = false;

    // Jika tidak ada primary key yang didefinisikan (auto increment)
    protected $primaryKey = 'sk_produksi'; // Tentukan primary key jika diperlukan

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'sk_produksi',
        'amount',
        'sk_produk',
        'sk_waktu'
    ];
}
