<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactProduction extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'fact_productions';
    public $timestamps = false;

    protected $fillable = ['sk_produk', 'sk_waktu', 'sk_status_prod', 'amount'];
}
