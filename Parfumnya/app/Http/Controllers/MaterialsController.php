<?php

namespace App\Http\Controllers;

use App\Models\Materialsorder;
use App\Models\Material; // Pastikan model Material diimport
use App\Http\Requests\AddMaterialsorder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialsorderController extends Controller
{
    public function materialsIndex()
    {
        $materials = Materialsorder::orderBy('created_at', 'desc')->paginate(5);
        return view('Bismillah.materials', compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function historyIndex()
    {
        $materials = Materialsorder::orderBy('created_at', 'desc')->paginate(5);
        return view('Bismillah.hist-materialsorder', compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(AddMaterialsorder $request)
    {
        $materialsorder = new Materialsorder($request->validated());
        $materialsorder->Status = false;
        $materialsorder->save();

        return redirect()->route('Bismillah.hist-materialsorder')
            ->with('success', 'Material order berhasil ditambahkan!');
    }

    public function updateStatus(Request $request, $id)
    {
        $materialsorder = Materialsorder::findOrFail($id);
        $materialsorder->Status = true;
        $materialsorder->save();

        // Tambahkan data ke tabel materials
        $material = new Material();
        $material->MaterialID = $materialsorder->MaterialID;
        $material->MaterialName = $materialsorder->MaterialName;
        $material->Price = $materialsorder->Price;
        $material->Measure = $materialsorder->Measure;
        $material->Quantity = $materialsorder->Quantity;
        $material->Description = $materialsorder->Description;
        $material->save();

        return response()->json(['success' => true]);
    }
}