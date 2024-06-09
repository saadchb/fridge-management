@extends('layouts.admin.app')
@section('title','Dachboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Détails du Bon d'Entrée
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Date</label>
                            <p>{{ $bonEntre->date }}</p>
                        </div>
                        <div class="form-group">
                            <label>Date d'Entrée</label>
                            <p>{{ $bonEntre->date_entre }}</p>
                        </div>
                        <div class="form-group">
                            <label>Date de Sortie</label>
                            <p>{{ $bonEntre->date_sort }}</p>
                        </div>
                        <div class="form-group">
                            <label>Observation</label>
                            <p>{{ $bonEntre->observation }}</p>
                        </div>
                        <div class="form-group">
                            <label>Vendeur</label>
                            <p>{{ $bonEntre->vendeur->nom }} {{ $bonEntre->vendeur->prenom }}</p>
                        </div>
                        <a href="{{ route('bonentres.index') }}" class="btn btn-primary">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
