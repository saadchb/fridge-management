@extends('layouts.admin.app')
@section('title','Ajouteé Produit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Détails du Bon de Sortie
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Date</label>
                            <p>{{ $bonSort->date }}</p>
                        </div>
                        <div class="form-group">
                            <label>Observation</label>
                            <p>{{ $bonSort->observation }}</p>
                        </div>
                        <div class="form-group">
                            <label>Vendeur</label>
                            <p>{{ $bonSort->vendeur->nom }} {{ $bonSort->vendeur->prenom }}</p>
                        </div>
                        <a href="{{ route('bonsorts.index') }}" class="btn btn-primary">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
