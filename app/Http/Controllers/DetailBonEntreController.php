<?php

namespace App\Http\Controllers;

use App\Models\DetailBonEntre;
use Illuminate\Http\Request;

class DetailBonEntreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = DetailBonEntre::all();
        return view('detail_bon_entre.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detail_bon_entre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DetailBonEntre::create($request->all());
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBonEntre $detailBonEntre)
    {
        return view('detail_bon_entre.show', compact('detailBonEntre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailBonEntre $detailBonEntre)
    {
        return view('detail_bon_entre.edit', compact('detailBonEntre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailBonEntre $detailBonEntre)
    {
        $detailBonEntre->update($request->all());
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBonEntre $detailBonEntre)
    {
        $detailBonEntre->delete();
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée supprimé avec succès.');
    }
}
