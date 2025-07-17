<?php

namespace App\Http\Controllers;

use App\Models\Materialsorder;
use App\Models\Materials;
use App\Http\Requests\AddMaterialsorder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class MaterialsorderController extends Controller
{
    /**
     * Display a listing of the materials.
     */
    public function materialsIndex()
    {
        $materials = Materials::orderBy('created_at', 'desc')->paginate(5);
        return view('Bismillah.materials', compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the materials orders.
     */
    public function historyIndex()
    {
        $materials = Materialsorder::orderBy('created_at', 'desc')->paginate(5);
        return view('Bismillah.hist-materialsorder', compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created materials order in storage.
     */
    public function store(AddMaterialsorder $request)
    {
        $materialsorder = new Materialsorder($request->validated());
        $materialsorder->Status = false;
        $materialsorder->save();

        return redirect()->route('Bismillah.hist-materialsorder')
            ->with('success', 'Material order berhasil ditambahkan!');
    }

    /**
     * Update the specified materials order status in storage.
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $materialsorder = Materialsorder::findOrFail($id);
            $materialsorder->Status = true;
            $materialsorder->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error updating material status: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Check if a material exists and return its details.
     */
    public function checkMaterial($materialId)
    {
        $material = Materials::where('MaterialID', $materialId)->first();

        if ($material) {
            return response()->json([
                'exists' => true,
                'MaterialName' => $material->MaterialName,
                'Price' => $material->Price,
                'Measure' => $material->Measure
            ]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}