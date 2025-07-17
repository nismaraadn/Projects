<?php

namespace App\Http\Controllers;

use App\Models\QualityControl;
use Illuminate\Http\Request;

class QualityControlController extends Controller
{
    public function index()
    {
        // Mengambil data QualityControl yang diurutkan berdasarkan ID secara descending
        $qualityControls = QualityControl::orderBy('id', 'desc')->get();

        // Mengirimkan data ke view
        return view('qc.qc', compact('qualityControls'));
    }


    public function updateQCStatus(Request $request)
    {
        $validated = $request->validate([
            'qc_id' => 'required|exists:quality_controls,id',
            'status' => 'required|in:On Process,Approved,Rejected',
            'description' => 'required|string',
        ]);
    
        try {
            $qc = QualityControl::findOrFail($request->qc_id);
            $qc->status = $request->status;
            $qc->detail = $request->description;
            $qc->save();
    
            return response()->json([
                'success' => true,
                'data' => [
                    'status' => $qc->status,
                    'qc_id' => $qc->id,
                    'description' => $qc->detail
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('QC Status Update Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update QC status'
            ], 500);
        }
    }
    
    public function submitToProduction(Request $request)
    {
        try {
            $qc = QualityControl::findOrFail($request->qc_id);
            $qc->status = 'Submitted to Production';
            $qc->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Successfully submitted to production'
            ]);
        } catch (\Exception $e) {
            \Log::error('Submit to Production Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit to production'
            ], 500);
        }
    }
    
    public function submitToWarehouse(Request $request)
    {
        try {
            $qc = QualityControl::findOrFail($request->qc_id);
            $qc->status = 'Submitted to Warehouse';
            $qc->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Successfully submitted to warehouse'
            ]);
        } catch (\Exception $e) {
            \Log::error('Submit to Warehouse Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit to warehouse'
            ], 500);
        }
    }
}