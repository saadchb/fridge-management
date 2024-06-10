@extends('layouts.admin.app')
@section('title','Bon Sortie')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br><br>
                <div class="card">
                    <div class="card-header">
                        Liste des Bons de Sortie
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Observation</th>
                                    <th>Vendeur</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bonSorts as $bonSort)
                                    <tr>
                                        <td>{{ $bonSort->id }}</td>
                                        <td>{{ $bonSort->date }}</td>
                                        <td>{{ $bonSort->observation }}</td>
                                        <td>{{ $bonSort->vendeur->nom }} {{ $bonSort->vendeur->prenom }}</td>
                                        <td>
                                            <a href="{{ route('bonsorts.show', $bonSort->id) }}" class="btn btn-info">Voir</a>
                                            <!-- <a href="{{ route('bonsorts.edit', $bonSort->id) }}" class="btn btn-warning">Modifier</a> -->
                                            <form action="{{ route('bonsorts.destroy', $bonSort->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bon de sortie ?')">Supprimer</button>
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
    </div><br><br>
@endsection
