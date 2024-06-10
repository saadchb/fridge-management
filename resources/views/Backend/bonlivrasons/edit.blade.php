@extends('layouts.admin.app')
@section('title','Bonlivraison')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Modifier Bon de Livraison</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('bonlivrasons.update', ['bonLivrason' => $bon->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ $bon->date }}">
                            </div>
                            <div class="form-group">
                                <label for="observation">Observation:</label>
                                <textarea id="observation" name="observation" class="form-control">{{ $bon->observation }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="vendeur_id">Vendeur:</label>
                                <select name="vendeur_id" id="vendeur_id" class="form-control">
                                    @foreach ($vendeurs as $vendeur)
                                        <option value="{{ $vendeur->id }}" @if($bon->vendeur_id == $vendeur->id) selected @endif>{{ $vendeur->nom }} {{ $vendeur->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="client_id">Client:</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @if($bon->client_id == $client->id) selected @endif>{{ $client->nom }} {{ $client->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Ajoutez d'autres champs à éditer ici --}}
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
