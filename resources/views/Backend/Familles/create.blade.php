@extends('layouts.admin.app')
@section('title','Ajouteé famille')
@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajoutée Famille</h4>
                <form class="form-sample">
                    <p class="card-description">
                        
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Famille </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>                          
                            <center>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Annuler</button>
                                </center>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection