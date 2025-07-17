<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReproductionDashboardController extends Controller
{
    public function index()
    {
        // Data untuk chart reproduksi per produk
        $reproductionChartData = DB::connection('datawarehouse')
            ->table('fact_reproduksi')
            ->join('dim_produk as dp', 'fact_reproduksi.sk_produk', '=', 'dp.sk_produk')
            ->select('dp.ProductName', DB::raw('COUNT(*) as count'))
            ->groupBy('dp.ProductName')
            ->get();
    
        // Data total amount untuk reproduksi
        $reproductionData = DB::connection('datawarehouse')
            ->table('fact_reproduksi')
            ->select(DB::raw('SUM(amount) as total_amount'))
            ->first();
    
        return view('dashboard.production-dashboard', [
            'reproductionChartData' => $reproductionChartData,
            'reproductionData' => $reproductionData
        ]);
    }
}
