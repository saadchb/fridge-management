<?php

namespace App\Http\Controllers;

use App\Models\DetailBonSort;
use Illuminate\Http\Request;

class DetailBonSortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = DetailBonSort::all();
        return view('details_bon_sort.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('details_bon_sort.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DetailBonSort::create($request->all());
        return redirect()->route('details_bon_sort.index')->with('success', 'Détail du bon de sortie ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBonSort $detailBonSort)
    {
        return view('details_bon_sort.show', compact('detailBonSort'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailBonSort $detailBonSort)
    {
        return view('details_bon_sort.edit', compact('detailBonSort'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailBonSort $detailBonSort)
    {
        $detailBonSort->update($request->all());
        return redirect()->route('details_bon_sort.index')->with('success', 'Détail du bon de sortie mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBonSort $detailBonSort)
    {
        $detailBonSort->delete();
        return redirect()->route('details_bon_sort.index')->with('success', 'Détail du bon de sortie supprimé avec succès.');
    }
}
