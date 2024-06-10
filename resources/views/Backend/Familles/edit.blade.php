@extends('layouts.admin.app')
@section('title','Modifier famille')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Les Familles
        </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/familles">Les Familles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier famille</li>
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
                <h4 class="card-title">Modifier Famille</h4>
                <form action="{{ route('familles.update', $famille->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="card-description">
                        
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="famille">Famille </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="famille" id="famille" value="{{$famille->famille}}">
                                </div>
                            </div>                          
                            <center>
                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                <a href="{{ route('familles.index') }}" class="btn btn-light">Annuler</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection