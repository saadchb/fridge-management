@extends('layouts.admin.app')
@section('title','Bon Entrée')
@section('content')
    <div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br>
                <div class="card">
                    <div class="card-header">
                        Liste des Bons d'Entrée
                    </div>
                    <div class="card-body">
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
                                            <a href="{{ route('bonentres.show', $bonEntre->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('bonentres.edit', $bonEntre->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt btn-icon-append"></i></a>
                                            <form action="{{ route('bonentres.destroy', $bonEntre->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash "></i></button>
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
    </div><br>
@endsection
