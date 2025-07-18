<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $primarykey = 'MaterialID';
    protected $fillable = [
        'MaterialID',
        'MaterialName',
        'Price',
        'Measure',
        'Quantity',
        'Description'
    ];
}
