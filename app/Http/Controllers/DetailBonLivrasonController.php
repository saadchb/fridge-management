<?php

namespace App\Http\Controllers;

use App\Models\DetailBonLivrason;
use Illuminate\Http\Request;

class DetailBonLivrasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = DetailBonLivrason::all();
        return view('detail_bon_livrason.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detail_bon_livrason.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DetailBonLivrason::create($request->all());
        return redirect()->route('detail_bon_livrason.index')->with('success', 'Détail du bon de livraison ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBonLivrason $detailBonLivrason)
    {
        return view('detail_bon_livrason.show', compact('detailBonLivrason'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailBonLivrason $detailBonLivrason)
    {
        return view('detail_bon_livrason.edit', compact('detailBonLivrason'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailBonLivrason $detailBonLivrason)
    {
        $detailBonLivrason->update($request->all());
        return redirect()->route('detail_bon_livrason.index')->with('success', 'Détail du bon de livraison mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBonLivrason $detailBonLivrason)
    {
        $detailBonLivrason->delete();
        return redirect()->route('detail_bon_livrason.index')->with('success', 'Détail du bon de livraison supprimé avec succès.');
    }
}
