<?php

namespace App\Http\Controllers;

use App\Models\ReglementClient;
use App\Models\Mode;
use App\Models\Client;
use Illuminate\Http\Request;

class ReglementClientController extends Controller
{
    public function index()
    {
        $reglements = ReglementClient::all();
        return view('reglements.index', compact('reglements'));
    }

    public function create()
    {
        return view('reglements.create');
    }

    public function showByClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        $mode = Mode::all(); 

        $reglements = ReglementClient::where('client_id', $clientId)->paginate(10); // Utilisez la pagination

        return view('reglements.show_by_client', compact('client', 'reglements', 'mode'));
    }


    public function edit(ReglementClient $reglement)
    {
        return view('reglements.edit', compact('reglement'));
    }

    public function update(Request $request, ReglementClient $reglement)
    {
        $reglement->update($request->all());
        return redirect()->route('reglements.index')->with('success', 'Règlement client mis à jour avec succès.');
    }

    public function destroy(ReglementClient $reglement)
    {
        $reglement->delete();
        return redirect()->route('reglements.index')->with('success', 'Règlement client supprimé avec succès.');
    }
}
