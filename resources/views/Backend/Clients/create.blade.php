@extends('layouts.admin.app')
@section('title','Ajouteé Client')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Les Clients
        </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/clients">Les Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajoutée Client</li>
        </ol>
        </nav>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajoutée Client</h4>
                <form class="form-sample" action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="card-description">
                        
                    </p>
                    <div class="row">
                        <div class="col-md-12">                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom" id="nom">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="prenom">Prenom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prenom" id="prenom">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="adresse">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adresse" id="adresse">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="ville">Ville</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ville" id="ville">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="tell">Numero tel</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="tell" id="tell">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="vendeur_id">Vendeur</label>
                                <select name="vendeur_id" id="vendeur_id" class="btn btn-light dropdown-toggle">
                                    <option value="" selected disabled> Sélectionner un Vendeur </option>
                                    @foreach($vendeurs as $vendeur)
                                        <option value="{{$vendeur->id}}">{{$vendeur->nom}} {{$vendeur->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>                          
                            <center>
                                <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-light">Annuler</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection