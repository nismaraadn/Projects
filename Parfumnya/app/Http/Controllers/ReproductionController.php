<?php

namespace App\Http\Controllers;

use App\Models\Reproduction;
use Illuminate\Http\Request;

class ReproductionController extends Controller
{
    public function index()
    {
        // Data dengan status 'Rejected'
        $rejectedProductions = Reproduction::where('status', 'Rejected')->get();
        
        // Data dengan status 'Returned'
        $returnedProductions = Reproduction::where('status', 'Returned')->get();

        return view('reproductions.index', compact('rejectedProductions', 'returnedProductions'));
    }

    public function edit($id)
    {
        $reproduction = Reproduction::findOrFail($id);
        return view('reproductions.edit', compact('reproduction'));
    }

    public function update(Request $request, $id)
    {
        $reproduction = Reproduction::findOrFail($id);
        $reproduction->date = $request->input('date');
        $reproduction->save();

        return redirect()->route('reproductions.index')->with('success', 'Reproduction date updated successfully.');
    }

    public function destroy($id)
    {
        $reproduction = Reproduction::findOrFail($id);
        $reproduction->delete();

        return redirect()->route('reproductions.index')->with('success', 'Production deleted successfully.');
    }
        
    public function updateStatus(Request $request, $id)
    {
        $production = Reproduction::findOrFail($id);
        $production->status = 'Returned'; // Atur status menjadi 'Returned'
        $production->save();

        return response()->json(['success' => true]);
    }
}
