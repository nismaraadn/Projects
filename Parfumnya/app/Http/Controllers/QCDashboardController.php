<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FactQC;
use App\Models\DimProduk;
use App\Models\DimStatusQC;
use Carbon\Carbon;

class QCDashboardController extends Controller
{
    public function index()
{
    // Mengelompokkan query berdasarkan fungsi spesifik
    $statusData = $this->getStatusData();
    $productData = $this->getProductData();
    $totals = $this->getStatusTotals(['new', 'Approved', 'Rejected']);

    // Kirim data ke view
    return view('dashboard.qc-dashboard', [
        'statusData' => $statusData,
        'productData' => $productData,
        'totalNew' => $totals['new'] ?? 0,
        'totalApproved' => $totals['Approved'] ?? 0,
        'totalRejected' => $totals['Rejected'] ?? 0,
    ]);
}

// Fungsi di dalam controller
private function getStatusData()
{
    return FactQC::join('dim_status_qc', 'fact_qc.sk_status_qc', '=', 'dim_status_qc.sk_status_qc')
        ->selectRaw('dim_status_qc.status, COUNT(*) as count')
        ->groupBy('dim_status_qc.status')
        ->get();
}

private function getProductData()
{
    return FactQC::join('dim_produk', 'fact_qc.sk_produk', '=', 'dim_produk.sk_produk')
        ->join('dim_status_qc', 'fact_qc.sk_status_qc', '=', 'dim_status_qc.sk_status_qc')
        ->selectRaw('dim_produk.ProductName as nama_produk, 
                     SUM(CASE WHEN dim_status_qc.status = "Approved" THEN 1 ELSE 0 END) as approved, 
                     SUM(CASE WHEN dim_status_qc.status = "Rejected" THEN 1 ELSE 0 END) as rejected')
        ->groupBy('dim_produk.ProductName')
        ->get();
}

private function getStatusTotals($statuses)
{
    // Pastikan semua status dihitung
    return FactQC::join('dim_status_qc', 'fact_qc.sk_status_qc', '=', 'dim_status_qc.sk_status_qc')
        ->selectRaw('dim_status_qc.status, COUNT(*) as total')
        ->groupBy('dim_status_qc.status')
        ->whereIn('dim_status_qc.status', $statuses)
        ->pluck('total', 'status')
        ->toArray(); // Pastikan hasil dalam format array
}

}