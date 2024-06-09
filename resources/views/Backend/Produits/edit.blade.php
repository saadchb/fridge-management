@extends('layouts.admin.app')
@section('title','Modifier Produit')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Les Produits
        </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/produits">Les Produits</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Produit</li>
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
                <h4 class="card-title">Modifier Produit</h4>
                <form class="form-sample" action="{{route('produits.update', $produit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="card-description">
                        
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="image">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="image" value="{{$produit->image}}">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="designation">Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="designation" id="designation" value="{{$produit->designation}}">
                                </div>
                            </div>                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="famille_id">Famille</label>
                                <select name="famille_id" id="famille_id" class="btn btn-light dropdown-toggle">
                                    <option value="" selected disabled> Sélectionner une famille </option>
                                    @foreach($familles as $famille)
                                        <option value="{{$famille->id}}" @if ($famille->id == $produit->famille_id) selected @endif > {{$famille->famille}}</option>
                                    @endforeach
                                </select>
                            </div>                          
                            <center>
                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                <a href="{{ route('produits.index') }}" class="btn btn-light">Annuler</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection