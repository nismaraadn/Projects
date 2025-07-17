<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimStatusProd extends Model
{
    protected $table = 'dim_status_prod';
    protected $primaryKey = 'sk_status_prod';
    public $timestamps = false;

    protected $fillable = ['status_production'];
}
