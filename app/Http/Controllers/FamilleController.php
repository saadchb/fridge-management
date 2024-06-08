<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    public function index()
    {
        $familles = Famille::all();
        return view('familles.index', compact('familles'));
    }

    public function create()
    {
        return view('familles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);
        Famille::create($request->all());
        return redirect()->route('familles.index')->with('success', 'Famille Bien ajoutée .');
    }

    public function edit(Famille $famille)
    {
        return view('familles.edit', compact('famille'));
    }

    public function show(Famille $famille)
    {
        return view('familles.show', compact('famille'));
    }

    public function update(Request $request, Famille $famille)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);
    
        $famille->update($request->all());
    
        return redirect()->route('familles.index')->with('success', 'Famille Bien modifiée.');
    }

    public function destroy(Famille $famille)
    {
        $famille->delete();
        return redirect()->route('familles.index')->with('success', 'Famille Bien supprimée .');
    }
}
