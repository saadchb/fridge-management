<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    public function index()
    {
        $familles = Famille::all();
        $table ='familles';
        return view('Backend.familles.index', compact('familles','table'));
    }

    public function create()
    {
        $table ='familles';
        return view('Backend.familles.create',compact('table'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);
        Famille::create($request->all());
        return redirect()->route('familles.index')->with('success', 'Famille ajoutée avec succès.');
    }

    public function edit(Famille $famille)
    {
        $table ='familles';
        return view('Backend.familles.edit', compact('famille','table'));
    }
    public function show(Famille $famille)
    {
        return view('Backend.familles.show', compact('famille'));
    }
    public function update(Request $request, Famille $famille)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);
    
        $famille->update($request->all());
    
        return redirect()->route('familles.index')->with('success', 'Famille mise à jour avec succès.');
    }

    public function destroy(Famille $famille)
    {
        $famille->delete();
        return redirect()->route('familles.index')->with('success', 'Famille supprimée avec succès.');
    }
}
