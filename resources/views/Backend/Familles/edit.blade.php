@extends('layouts.admin.app')
@section('title','Modifier Famille')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Famille</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/familles">Famille</a></div>
            <div class="breadcrumb-item">Modifier Famille {{$famille->libelle}}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card">
                    <form action="{{route('familles.update',$famille->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-header">
                            <h4>Ajoutee nouvelle Famille</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nom de Famille </label>
                                <input type="text" value="{{$famille->libelle}}" name="libelle" class="form-control">
                                @error('libelle')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" value="$famille->image" class="form-control">
                           <br>
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="active" value="{{$famille->active}}" class="custom-control-input" id="active" @if ($famille->active == 1) checked @endif>
                                        <label class="custom-control-label" for="active">Afficher la famille dans la page d'accueil</label>
                                    </div>
                            @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror </div>
                        
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Enrégistre</button>
                            <a href="/familles" class="btn btn-danger">annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection