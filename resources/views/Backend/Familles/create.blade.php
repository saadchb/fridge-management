@extends('layouts.admin.app')
@section('title','Ajouteé famille')
@section('content')

<!-- <div class="main-content" style="min-height: 434px;"> -->
<section class="section">
    <div class="section-header">
        <h1>Famille</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/familles">Famille</a></div>
            <div class="breadcrumb-item">Ajoutee Famile</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card">
                    <form action="{{route('familles.store')}}" class="mt-4" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Ajoutee nouvelle famille</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                @if(!$errors->has('libelle'))
                                <label for="libelle">Nom de Famille</label>
                                <input type="text" name="libelle" class="form-control">
                                @else
                                <label for="libelle" class="text-danger">Nom de Famille (Erreur)</label>
                                <input type="text" name="libelle" placeholder="nom du famille" class="form-control is-invalid">
                                <div class="invalid-feedback">{{ $errors->first('libelle') }}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                @if(!$errors->has('image'))
                                <label>Image </label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input " id="customFile">
                                    <label class="custom-file-label" for="customFile">choisir une image</label>
                                </div>
                                @else
                                <label class="text-danger">Image (error)</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input is-invalid" id="customFile">
                                    <label class="custom-file-label" for="customFile">choisir une image</label>
                                </div><br>
                                @endif
                                @error('image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <br><br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="active" class="custom-control-input" id="active" {{ old('active') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="active">Afficher la famille dans la page d'accueil</label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Creé la famille</button>
                            <a href="/familles" class="btn btn-danger">annuler</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection