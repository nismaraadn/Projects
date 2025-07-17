<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactMaterial extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse'; // Koneksi ke data warehouse
    protected $table = 'fact_material'; // Nama tabel
    protected $primaryKey = 'sk_material'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps

    // Relasi ke DimMaterial
    public function material()
    {
        return $this->belongsTo(DimMaterial::class, 'sk_material', 'sk_material');
    }
}
