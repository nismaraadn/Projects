<?php

namespace App\Http\Controllers;

use App\Models\FactMaterial;
use Illuminate\Http\Request;

class MaterialDashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari FactMaterial beserta nama material dari DimMaterial
        $data = FactMaterial::with('material')->get();

        // Format data untuk Chart.js
        $chartData = [
            'labels' => $data->pluck('material.MaterialName'), // Nama Material
            'data' => $data->pluck('Quantity') // Kuantitas
        ];

        return view('dashboard.material', compact('chartData'));
    }
}
