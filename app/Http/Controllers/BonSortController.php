<?php

namespace App\Http\Controllers;

use App\Models\BonSort;
use App\Models\DetailBonSort;
use App\Models\Vendeur;
use App\Models\Conditionnement;
use App\Models\Produit;
use Illuminate\Http\Request;

class BonSortController extends Controller
{
    public function index()
    {
        $table = 'bonsortie';
        $bonSorts = BonSort::all();
        return view('Backend.bonsorts.index', compact('bonSorts','table'));
    }

    public function create()
    {
        $table = 'bonsortie';
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('Backend.bonsorts.create', compact('vendeurs', 'conditionnements', 'produits','table'));
    }

    public function store(Request $request)
    {
        $bonSort = BonSort::create($request->only(['date', 'observation', 'vendeur_id']));

        foreach ($request->input('details') as $detail) {
            DetailBonSort::create([
                'bon_sort_id' => $bonSort->id,
                'conditionnement_id' => $detail['conditionnement_id'],
                'produit_id' => $detail['produit_id'],
                'qte' => $detail['qte'],
            ]);
        }

        return redirect()->route('bonsorts.index')->with('success', 'Bon de sortie ajouté avec succès.');
    }

    public function show(BonSort $bonSort)
    {
        $table = 'bonsortie';
        return view('Backend.bonsorts.show', compact('bonSort','table'));
    }

    public function edit(BonSort $bonSort)
    {
        $table = 'bonsortie';
        $vendeurs = Vendeur::all();
        return view('Backend.bonsorts.edit', compact('bonSort', 'vendeurs','table'));
    }

    public function update(Request $request, BonSort $bonSort)
    {
        $bonSort->update($request->only(['date', 'observation', 'vendeur_id']));

        DetailBonSort::where('bon_sort_id', $bonSort->id)->delete();

        foreach ($request->input('details') as $detail) {
            DetailBonSort::create([
                'bon_sort_id' => $bonSort->id,
                'conditionnement_id' => $detail['conditionnement_id'],
                'produit_id' => $detail['produit_id'],
                'qte' => $detail['qte'],
            ]);
        }

        return redirect()->route('bonsorts.index')->with('success', 'Bon de sortie mis à jour avec succès.');
    }

    public function destroy(BonSort $bonSort)
    {
        $bonSort->delete();
        return redirect()->route('bonsorts.index')->with('success', 'Bon de sortie supprimé avec succès.');
    }
}
