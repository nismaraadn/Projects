<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukDashboardController extends Controller 
{
    public function index() 
    {
        // Fetch products with stock details
        $products = DB::connection('datawarehouse')
            ->table('dim_produk')
            ->join('fact_produk', 'dim_produk.ProductID', '=', 'fact_produk.ProductID')
            ->select(
                'dim_produk.ProductName', 
                'fact_produk.Stock',
                DB::raw('CASE 
                    WHEN fact_produk.Stock < 500 THEN "Low Stock" 
                    WHEN fact_produk.Stock BETWEEN 500 AND 1000 THEN "Medium Stock" 
                    ELSE "High Stock" 
                END as StockStatus')
            )
            ->get();

        // Prepare stock distribution data
        $stockDistribution = $products->groupBy('StockStatus')
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'total_stock' => $group->sum('Stock')
                ];
            });

        // Prepare the product names and stocks for the chart
        $productNames = $products->pluck('ProductName');
        $stocks = $products->pluck('Stock');

        // Total products and total stock
        $totalProducts = $products->count();
        $totalStock = $products->sum('Stock');

        return view('dashboard.product', [
            'products' => $products,
            'totalProducts' => $totalProducts,
            'totalStock' => $totalStock,
            'stockDistribution' => $stockDistribution,
            'productNames' => $productNames,
            'stocks' => $stocks
        ]);
    }
}
