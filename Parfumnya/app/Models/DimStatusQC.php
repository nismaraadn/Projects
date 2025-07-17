<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimStatusQC extends Model
{
    use HasFactory;

    protected $connection = 'datawarehouse';
    protected $table = 'dim_status_qc';
    protected $primaryKey = 'sk_status_qc';
    public $timestamps = false;
}
