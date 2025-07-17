<?php
namespace App\Http\Controllers;

use App\Models\DimProduk;
use App\Models\DimStatusProd;
use App\Models\DimWaktu;
use App\Models\FactProduction;
use App\Models\DimProduksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductionDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Default filter values jika tidak ada filter yang diberikan
        $selectedYear = $request->input('year', date('Y')); // Default tahun adalah tahun sekarang
        $selectedProduct = $request->input('product', 'Citrus Sunshine'); // Default produk adalah 'Citrus Sunshine'

        // Query untuk data produksi utama
        $productionData = FactProduction::join('dim_produk as dp', 'fact_productions.sk_produk', '=', 'dp.sk_produk')
            ->select('dp.ProductName', DB::raw('SUM(fact_productions.amount) as amount'))
            ->groupBy('dp.ProductName')
            ->get();
        
        // Query untuk mendapatkan jumlah status "On Progress"
        $onProgressCount = FactProduction::join('dim_status_prod as dsp', 'fact_productions.sk_status_prod', '=', 'dsp.sk_status_prod')
            ->where('dsp.status_production', 'On Progress')  // Menambahkan kondisi untuk "On Progress"
            ->count();
        
        // Query untuk chart: menghitung jumlah produksi berdasarkan status produksi
        $productionChartData = FactProduction::join('dim_status_prod as dsp', 'fact_productions.sk_status_prod', '=', 'dsp.sk_status_prod')
            ->selectRaw('dsp.status_production as status, COUNT(*) as count')
            ->groupBy('dsp.status_production')
            ->get();
        
        // Query untuk chart produksi berdasarkan tahun dan produk yang dipilih
        // Updated Query for Production Status
        $productionByYearProductData = FactProduction::join('dim_produk as dp', 'fact_productions.sk_produk', '=', 'dp.sk_produk')
            ->join('dim_waktu as dw', 'fact_productions.sk_waktu', '=', 'dw.sk_waktu')
            ->where('dp.ProductName', $selectedProduct) // Filter by selected product
            ->whereYear('dw.Tanggal', $selectedYear)    // Filter by selected year
            ->select(
                DB::raw('MONTH(dw.Tanggal) as month'),
                DB::raw('SUM(fact_productions.amount) as amount')
            )
            ->groupBy(DB::raw('MONTH(dw.Tanggal)'))
            ->orderBy('month', 'asc')
            ->get();

        
        // Query untuk reproduksi chart data
        $reproductionChartData = DB::connection('datawarehouse')
            ->table('fact_reproduksi')
            ->join('dim_produk as dp', 'fact_reproduksi.sk_produk', '=', 'dp.sk_produk')
            ->select('dp.ProductName', DB::raw('COUNT(*) as count'))
            ->groupBy('dp.ProductName')
            ->get();
        
        // Query untuk total reproduction amount
        $reproductionData = DB::connection('datawarehouse')
            ->table('fact_reproduksi')
            ->select(DB::raw('SUM(amount) as total_amount'))
            ->first();
        
        // Daftar produk yang bisa dipilih
        $products = ['Citrus Sunshine', 'Vanilla Whisper', 'Velvet Rose'];

        // Kirim data ke view
        return view('dashboard.production-dashboard', [
            'productionData' => $productionData,  // Data jumlah produksi per produk
            'onProgressCount' => $onProgressCount, // Menambahkan jumlah "On Progress"
            'productionChartData' => $productionChartData,  // Data untuk chart status produksi
            'productionByYearProductData' => $productionByYearProductData, // Data chart berdasarkan tahun & produk
            'reproductionChartData' => $reproductionChartData,  // Data chart reproduksi
            'reproductionData' => $reproductionData,  // Total amount untuk reproduksi
            'selectedYear' => $selectedYear,  // Tahun yang dipilih
            'selectedProduct' => $selectedProduct, // Produk yang dipilih
            'products' => $products,  // Daftar produk untuk filter
        ]);
    }
}
