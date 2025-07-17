<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::all();
        return view('productions.index', compact('productions'));
    }

    public function create()
    {
        return view('productions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'production_id' => 'required|unique:productions',
            'product_id' => 'required',
            'date' => 'required|date',
            'amount' => 'required|integer',
            'status_production' => 'required',
        ]);

        Production::create($validatedData);

        return redirect()->route('productions.index')->with('success', 'Production batch added successfully.');
    }

    public function edit(Production $production)
    {
        return view('productions.edit', compact('production'));
    }

    public function update(Request $request, Production $production)
    {
        $validatedData = $request->validate([
            'production_id' => 'required|unique:productions,production_id,' . $production->id,
            'product_id' => 'required',
            'date' => 'required|date',
            'amount' => 'required|integer',
            'status_production' => 'required',
        ]);

        $production->update($validatedData);

        return redirect()->route('productions.index')->with('success', 'Production batch updated successfully.');
    }

    public function destroy(Production $production)
    {
        $production->delete();

        return redirect()->route('productions.index')->with('success', 'Production batch deleted successfully.');
    }
    
    public function submitToQC($id)
    {
        $production = Production::findOrFail($id);
        
        // Update the status or perform any actions needed for QC submission
        $production->status_production = 'Submitted to QC'; // Example status update
        $production->save();

        return redirect()->route('productions.index')->with('success', 'Production submitted to QC successfully.');
    }
}