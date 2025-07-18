<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5); // Mengambil 10 produk per halaman
        return view('Bismillah.produk', compact('products'));
    }
}