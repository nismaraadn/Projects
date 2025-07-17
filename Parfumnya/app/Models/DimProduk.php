<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimProduk extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'dim_produk';
    protected $primaryKey = 'sk_produk';
    public $timestamps = false;

    protected $fillable = ['ProductID', 'ProductName'];
}
