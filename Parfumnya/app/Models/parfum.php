<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parfum extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'Nama',
        'Harga',
        'Stok',
        'Deskripsi',
    ];
}
