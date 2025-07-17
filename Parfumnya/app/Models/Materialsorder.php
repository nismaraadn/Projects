<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialsorder extends Model
{
    use HasFactory;
    
    protected $table = 'materialsorder';
    protected $primaryKey = 'OrderID';
    
    protected $fillable = [
        'MaterialID',
        'MaterialName',
        'Price',
        'Measure',
        'Quantity',
        'Description',
        'Status'
    ];
}