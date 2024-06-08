<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use Illuminate\Http\Request;

class ConditionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionnements = Conditionnement::all();
        return view('conditionnements.index', compact('conditionnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conditionnements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'conditionnement' => 'required|string|max:255',
        ]);

        Conditionnement::create($request->all());
        return redirect()->route('conditionnements.index')->with('success', 'Conditionnement créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Conditionnement $conditionnement)
    {
        return view('conditionnements.show', compact('conditionnement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Conditionnement $conditionnement)
    {
        return view('conditionnements.edit', compact('conditionnement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conditionnement $conditionnement)
    {
        $request->validate([
            'conditionnement' => 'required|string|max:255',
        ]);

        $conditionnement->update($request->all());
        return redirect()->route('conditionnements.index')->with('success', 'Conditionnement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conditionnement $conditionnement)
    {
        $conditionnement->delete();
        return redirect()->route('conditionnements.index')->with('success', 'Conditionnement supprimé avec succès.');
    }
}
