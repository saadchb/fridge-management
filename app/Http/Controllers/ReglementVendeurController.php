<?php

namespace App\Http\Controllers;

use App\Models\ReglementVendeur;
use App\Models\Mode;
use App\Models\Vendeur;
use Illuminate\Http\Request;

class ReglementVendeurController extends Controller
{
    /**
     * Afficher une liste des règlements pour tous les vendeurs.
     */
    public function index()
    {
        $reglements = ReglementVendeur::with(['mode', 'vendeur'])->get();
        return view('reglement_vendeurs.index', compact('reglements'));
    }
    public function show($id)
    {
        $reglement = ReglementVendeur::find($id); // Récupérer le règlement en fonction de l'ID
        $vendeur = Vendeur::find($reglement->vendeur_id); // Récupérer le vendeur associé à ce règlement
    
        return view('reglement_vendeurs.show', compact('vendeur', 'reglement'));
    }
    /**
     * Afficher les règlements pour un vendeur spécifique.
     *
     * @param int $vendeurId
     * @return \Illuminate\View\View
     */
    public function showReglements($vendeurId)
    {
        $vendeur = Vendeur::findOrFail($vendeurId);
        $reglements = ReglementVendeur::where('vendeur_id', $vendeurId)->with('mode')->get();
        $totalMontant = $reglements->sum('montant');

        return view('reglement_vendeurs.index', compact('vendeur', 'reglements', 'totalMontant'));
    }

    /**
     * Afficher le formulaire de création d'un nouveau règlement pour un vendeur spécifique.
     *
     * @param int $vendeurId
     * @return \Illuminate\View\View
     */
    public function createReglement($vendeurId)
    {
        $vendeur = Vendeur::findOrFail($vendeurId);
        $modes = Mode::all();
        $reglements = ReglementVendeur::where('vendeur_id', $vendeurId)->get();
        $totalMontant = $reglements->sum('montant');

        return view('reglement_vendeurs.create', compact('vendeur', 'modes', 'totalMontant'));
    }

    /**
     * Enregistrer un nouveau règlement pour un vendeur spécifique.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $vendeurId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReglement(Request $request, $vendeurId)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'observation' => 'nullable|string',
            'mode_id' => 'required|exists:modes,id',
        ]);

        $validated['vendeur_id'] = $vendeurId;
        ReglementVendeur::create($validated);

        return redirect()->route('vendeurs.reglements', $vendeurId)->with('success', 'Règlement ajouté avec succès.');
    }

    public function edit($id)
    {
        $reglement = ReglementVendeur::find($id);
    
        if (!$reglement) {
            return redirect()->route('vendeurs.reglements')->with('error', 'Règlement introuvable.');
        }
        $vendeur = Vendeur::find($reglement->vendeur_id);
        $modes = Mode::all(); 
    
        return view('reglement_vendeurs.edit', compact('reglement', 'modes','vendeur'));
    }
    

    /**
     * Mettre à jour un règlement existant dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReglementVendeur $reglementVendeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'observation' => 'nullable|string',
            'mode_id' => 'required|exists:modes,id',
        ]);
    
        $reglement = ReglementVendeur::findOrFail($id); // Récupérer le règlement à mettre à jour
    
        $reglement->date = $request->input('date');
        $reglement->montant = $request->input('montant');
        $reglement->observation = $request->input('observation');
        $reglement->mode_id = $request->input('mode_id');
    
        $reglement->save();
    
        return redirect()->route('vendeurs.reglements', ['vendeurId' => $reglement->vendeur_id])->with('success', 'Le règlement a été mis à jour avec succès.');
    }
    
    
    /**
     * Supprimer un règlement de la base de données.
     *
     * @param \App\Models\ReglementVendeur $reglementVendeur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ReglementVendeur $reglementVendeur)
    {
        $vendeurId = $reglementVendeur->vendeur_id;
        $reglementVendeur->delete();

        return redirect()->route('vendeurs.reglements', $vendeurId)->with('success', 'Règlement supprimé avec succès.');
    }
    
}


