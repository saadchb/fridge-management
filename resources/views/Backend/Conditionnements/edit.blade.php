@extends('layouts.admin.app')
@section('title','Modifier conditionnement')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Les Conditionnements
        </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/conditionnements">Les Conditionnements</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier conditionnement</li>
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
                <h4 class="card-title">Modifier Conditionnement</h4>
                <form action="{{ route('conditionnements.update', $conditionnement->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="card-description">
                        
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="conditionnement">Conditionnement </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="conditionnement" id="conditionnement" value="{{$conditionnement->conditionnement}}">
                                </div>
                            </div>                          
                            <center>
                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                <a href="{{ route('conditionnements.index') }}" class="btn btn-light">Annuler</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection