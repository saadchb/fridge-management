<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vendeur;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $table ='clients';
        $clients = Client::all(); // Récupère tous les clients depuis la base de données
        return view('Backend.clients.index', compact('clients','table')); // Passe les clients à la vue 'clients.index'
    }
   
    public function create()
    {
        $vendeurs = Vendeur::all();
        $table ='clients';
        return view('Backend.clients.create', compact('vendeurs','table')); // Retourne la vue de création de client
    }
// Affiche les détails d'un client spécifique
public function show(Client $client)
{
    $table ='clients';
    return view('Backend.clients.show', compact('client','table')); // Retourne la vue 'clients.show' en passant le client à afficher
}

    public function store(Request $request)
    {
        $request->validate([ // Valide les données du formulaire
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'tell' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string',
            'vendeur_id' => 'required|exists:vendeurs,id',
        ]);

        Client::create($request->all()); // Crée un nouveau client avec les données de la requête
        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.'); // Redirige vers l'index des clients avec un message de succès
    }

    public function edit(Client $client)
{
    $vendeurs = Vendeur::all();
    $table ='clients';
    return view('Backend.clients.edit', compact('client','vendeurs','table'));
}


    public function update(Request $request, Client $client)
    {
        $request->validate([ // Valide les données du formulaire
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'tell' => 'required|string',
            'email' => 'required|email|unique:clients,email,'.$client->id, // Vérifie l'unicité de l'email en excluant le client actuel
            'password' => 'nullable|string', // Le mot de passe est facultatif lors de la mise à jour
            'vendeur_id' => 'required|exists:vendeurs,id',
        ]);

        $client->update($request->all()); // Met à jour les données du client avec les données de la requête
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.'); // Redirige vers l'index des clients avec un message de succès
    }

    public function destroy(Client $client)
    {
        $client->delete(); // Supprime le client de la base de données
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.'); // Redirige vers l'index des clients avec un message de succès
    }
}
