<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Famille;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $familles = Famille::all();
        return view('produits.create', compact('familles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            'famille_id' => 'required|exists:familles,id',
        ]);

        $validatedData = $request->only('designation', 'famille_id');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Produit::create($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $familles = Famille::all();
        return view('produits.edit', compact('produit', 'familles'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'designation' => 'required|string',
            'famille_id' => 'required|exists:familles,id',
        ]);

        $produit->update($request->only('designation', 'famille_id'));

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
