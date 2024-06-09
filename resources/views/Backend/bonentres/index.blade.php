@extends('layouts.admin.app')
@section('title','Dachboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Liste des Bons d'Entrée
                    </div>
                    <div class="card-body">
                        <a href="{{ route('bonentres.create') }}" class="btn btn-primary mb-3">Ajouter un Bon d'Entrée</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Date d'Entrée</th>
                                    <th>Date de Sortie</th>
                                    <th>Observation</th>
                                    <th>Vendeur</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bonentres as $bonEntre)
                                    <tr>
                                        <td>{{ $bonEntre->date }}</td>
                                        <td>{{ $bonEntre->date_entre }}</td>
                                        <td>{{ $bonEntre->date_sort }}</td>
                                        <td>{{ $bonEntre->observation }}</td>
                                        
                                        <td>{{ $bonEntre->vendeur->nom }} {{ $bonEntre->vendeur->prenom }}</td>
                                        <td>
                                            <a href="{{ route('bonentres.show', $bonEntre->id) }}" class="btn btn-info">Voir</a>
                                            <a href="{{ route('bonentres.edit', $bonEntre->id) }}" class="btn btn-warning">Modifier</a>
                                            <form action="{{ route('bonentres.destroy', $bonEntre->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
