<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactQC extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'fact_qc';
    protected $primaryKey = 'sk_produksi';
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(DimProduk::class, 'sk_produk', 'sk_produk');
    }

    public function statusQC()
    {
        return $this->belongsTo(DimStatusQC::class, 'sk_status_qc', 'sk_status_qc');
    }
    

    public function produksi()
    {
        return $this->belongsTo(DimProduksi::class, 'sk_produksi', 'sk_produksi');
    }
}
