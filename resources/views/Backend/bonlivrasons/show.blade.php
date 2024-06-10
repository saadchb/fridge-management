@extends('layouts.admin.app')
@section('title','Bonlivraison')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Détails du Bon de Livraison</div>

                    <div class="card-body">
                       
                        <div>
                            <strong>Date de Livraison:</strong> {{ $bon->date }}
                        </div>
                        <div>
                            <strong>observation:</strong> {{ $bon->observation }}
                        </div>
                        <div>
                            <strong>Vendeur:</strong> {{ $bon->vendeur->nom }} {{ $bon->vendeur->prenom }}
                        </div>
                        <div>
                            <strong>Client:</strong> {{ $bon->client->nom }} {{ $bon->client->prenom }}
                        </div>
                       
                        <!-- Ajoutez d'autres détails du bon de livraison selon vos besoins -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
