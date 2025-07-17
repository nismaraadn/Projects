<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimProduksi extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'dim_produksi';
    protected $primaryKey = 'sk_produksi';
    public $timestamps = false;
}
