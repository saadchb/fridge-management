<?php

namespace App\Http\Controllers;

use App\Models\BonEntre;
use App\Models\DetailBonEntre;
use App\Models\Vendeur;
use App\Models\Conditionnement;
//use App\Models\DetailBonEntre;
use App\Models\Produit;
use Illuminate\Http\Request;

class BonEntreController extends Controller
{
    public function index()
    {
        $bonentres = BonEntre::with('vendeur')->get();
        $details = DetailBonEntre::all();
        return view('bonentres.index', compact('bonentres', 'details'));
    }

    public function create()
    {
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        $bonentres = BonEntre::all();
        return view('bonentres.create', compact('vendeurs','bonentres','conditionnements','produits'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'date' => 'required|date',
            'date_entre' => 'required|date',
            'observation' => 'nullable|string',
            'vendeur_id' => 'required|numeric',
            'date_sort' => 'nullable|date',
            'details.*.conditionnement_id' => 'required|numeric',
            'details.*.produit_id' => 'required|numeric',
            'details.*.qte' => 'required|numeric|min:1',
            'details.*.prix' => 'required|numeric|min:0',
        ]);

        // Création du bon d'entrée
        $bonEntre = BonEntre::create([
            'date' => $request->input('date'),
            'date_entre' => $request->input('date_entre'),
            'date_sort' => $request->input('date_sort'),
            'observation' => $request->input('observation'),
            'vendeur_id' => $request->input('vendeur_id'),
        ]);

        // Ajout des détails du bon d'entrée
        foreach ($request->input('details') as $detail) {
            DetailBonEntre::create([
                'bon_entre_id' => $bonEntre->id,
                'conditionnement_id' => $detail['conditionnement_id'],
                'produit_id' => $detail['produit_id'],
                'qte' => $detail['qte'],
                'prix' => $detail['prix'],
            ]);
        }

        return redirect()->route('bonentres.index')->with('success', 'Bon d\'entrée créé avec succès.');
    }


    public function show(BonEntre $bonEntre)
    {
        return view('bonentres.show', compact('bonEntre'));
    }

    public function edit(BonEntre $bonEntre)
    {
        $vendeurs = Vendeur::all();
        return view('bonentres.edit', compact('bonEntre', 'vendeurs'));
    }

    public function update(Request $request, BonEntre $bonEntre)
    {
        $bonEntre->update($request->all());
        return redirect()->route('bonentres.index')->with('success', 'Bon d\'entrée mis à jour avec succès.');
    }

    public function destroy(BonEntre $bonEntre)
    {
        $bonEntre->delete();
        return redirect()->route('bonentres.index')->with('success', 'Bon d\'entrée supprimé avec succès.');
    }

    public function createDetail()
    {
        return view('detail_bon_entre.create');
    }

    public function storeDetail(Request $request)
    {
        DetailBonEntre::create($request->all());
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée ajouté avec succès.');
    }

    public function showDetail(DetailBonEntre $detailBonEntre)
    {
        return view('detail_bon_entre.show', compact('detailBonEntre'));
    }

    public function editDetail(DetailBonEntre $detailBonEntre)
    {
        return view('detail_bon_entre.edit', compact('detailBonEntre'));
    }

    public function updateDetail(Request $request, DetailBonEntre $detailBonEntre)
    {
        $detailBonEntre->update($request->all());
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée mis à jour avec succès.');
    }

    public function destroyDetail(DetailBonEntre $detailBonEntre)
    {
        $detailBonEntre->delete();
        return redirect()->route('detail_bon_entre.index')->with('success', 'Détail du bon d\'entrée supprimé avec succès.');
    }
}
