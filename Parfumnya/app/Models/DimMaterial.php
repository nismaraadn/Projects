<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimMaterial extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse'; // Koneksi ke data warehouse
    protected $table = 'dim_material'; // Nama tabel
    protected $primaryKey = 'sk_material'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps
}
