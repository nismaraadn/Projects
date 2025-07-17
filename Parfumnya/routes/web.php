<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\MaterialsorderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReproductionController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialDashboardController;
use App\Http\Controllers\ProdukDashboardController;
use App\Http\Controllers\QCDashboardController;
use App\Http\Controllers\ProductionDashboardController;
use App\Http\Controllers\ReproductionDashboardController;

Route::post('/update-qc-status', [QualityControlController::class, 'updateQCStatus'])->name('update-qc-status');
Route::post('/submit-to-production', [QualityControlController::class, 'submitToProduction'])->name('submit-to-production');
Route::post('/submit-to-warehouse', [QualityControlController::class, 'submitToWarehouse'])->name('submit-to-warehouse');
Route::prefix('qc')->group(function () {
    Route::get('/', [QualityControlController::class, 'index'])->name('qc.index');
});

Route::post('/reproductions/{id}/return', 'ReproductionController@returnToProduction')->name('reproductions.returnToProduction');

Route::get('/', function () {
    return view('Bismillah.landingpage');
})->name('Bismillah.landingpage');

Route::get('/sesi', [SessionController::class, 'index'])->name('login.form');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('login');

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/new-dashboard', function () {
        return view('Bismillah.new-dashboard');
    })->name('new-dashboard');

    Route::resource('/productions', ProductionController::class);
    Route::get('/new-dashboard-prod', function () {
        return view('productions.new-dashboard-prod');
    })->name('new-dashboard-prod');

    Route::get('/new-dashboard-qc', function () {
        return view('qc.new-dashboard-qc');
    })->name('new-dashboard-qc');

    Route::get('/new-dashboard-sales', function () {
        return view('sales.dashboard');
    })->name('new-dashboard-sales');
});

Route::get('/materials', [MaterialsorderController::class, 'materialsIndex'])->name('Bismillah.materials');
Route::get('/hist-materialsorder', [MaterialsorderController::class, 'historyIndex'])->name('Bismillah.hist-materialsorder');
Route::post('/materialsorder', [MaterialsorderController::class, 'store'])->name('materialsorder.store');

Route::post('/update-material-status/{id}', [MaterialsorderController::class, 'updateStatus'])
->name('materials.updateStatus');

Route::get('/check-material/{materialId}', [MaterialsorderController::class, 'checkMaterial']);

Route::get('/qc-history', function () {
    return view('qc.qc-history');
})->name('qc-history');

Route::resource('reproductions', ReproductionController::class);

Route::post('reproductions/{id}/return', [ReproductionController::class, 'returnToProduction'])->name('reproductions.returnToProduction');
Route::resource('productions', ProductionController::class);
Route::post('/productions/{id}/submit-to-qc', [ProductionController::class, 'submitToQC'])->name('productions.submitToQC');

Route::post('/reproductions/{id}/update-status', [ReproductionController::class, 'updateStatus']);

Route::get('/products', [ProductController::class, 'index'])->name('Bismillah.index');


Route::get('/dashboard/material', [MaterialDashboardController::class, 'index'])->name('dashboard.material');
Route::get('/qc-dashboard', [QCDashboardController::class, 'index'])->name('dashboard.qc');

Route::get('/production-dashboard', [ProductionDashboardController::class, 'index'])->name('production.dashboard');
Route::get('/reproduction-dashboard', [ReproductionDashboardController::class, 'index'])->name('reproduction.dashboard');

Route::get('/dashboard/product', [ProdukDashboardController::class, 'index'])->name('dashboard.product');