<?php

namespace App\Http\Controllers;

use App\Models\BonLivrason;
use App\Models\DetailBonLivrason;
use Illuminate\Http\Request;
use App\Models\Conditionnement;
use App\Models\Produit;
use App\Models\Vendeur;
use App\Models\Client;

class BonLivrasonController extends Controller
{
    public function index()
    {
        $bons = BonLivrason::all();
        return view('bonlivrasons.index', compact('bons'));
    }

    public function create()
    {
        $vendeurs = Vendeur::all();
        $clients = Client::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bonlivrasons.create', compact('vendeurs', 'clients', 'produits', 'conditionnements'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'date' => 'required|date',
            'observation' => 'nullable|string',
            'vendeur_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'details.*.conditionnement_id' => 'required|numeric',
            'details.*.produit_id' => 'required|numeric',
            'details.*.qte' => 'required|numeric|min:1',
            'details.*.prix_vente' => 'required|numeric|min:0',
        ]);

        // Création du bon de livraison
        $bonLivrason = BonLivrason::create([
            'date' => $request->input('date'),
            'observation' => $request->input('observation'),
            'vendeur_id' => $request->input('vendeur_id'),
            'client_id' => $request->input('client_id'),
        ]);

        // Ajout des détails du bon de livraison
        foreach ($request->input('details') as $detail) {
            $details= DetailBonLivrason::create([
                'bon_livraison_id' => $bonLivrason->id,
                'conditionnement_id' => $detail['conditionnement_id'],
                'produit_id' => $detail['produit_id'],
                'qte' => $detail['qte'],
                'prix_vente' => $detail['prix_vente'],
            ]);
        }

        dd($details);

        return redirect()->route('bonlivraisons.index')->with('success', 'Bon de livraison créé avec succès.');
    }
    public function edit(BonLivrason $bon)
    {
        $vendeurs = Vendeur::all();
        $clients = Client::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bonlivrasons.edit', compact('bon', 'vendeurs', 'clients', 'produits', 'conditionnements'));
    }

    public function update(Request $request, BonLivrason $bon)
    {
        $bon->update($request->all());
        return redirect()->route('bonlivrasons.index')->with('success', 'Bon de livraison mis à jour avec succès.');
    }

    public function show(BonLivrason $bon)
    {
        return view('bonlivrasons.show', compact('bon'));
    }

    public function destroy(BonLivrason $bon)
    {
        $bon->delete();
        return redirect()->route('bonlivrasons.index')->with('success', 'Bon de livraison supprimé avec succès.');
    }
}
