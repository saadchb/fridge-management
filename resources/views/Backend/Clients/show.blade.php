@extends('layouts.admin.app')
@section('title','Show Client')
@section('button_create')
<li class="nav-item d-none d-lg-flex">
  <a class="nav-link" href="{{route('clients.index')}}">
    <span class="btn btn-light"><- Back</span>
  </a>
</li>
@endsection
@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
     Details de Client N°:{{$client->id}}
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/clients">Les Clients</a></li>
        <li class="breadcrumb-item active" aria-current="page">Details</li>
      </ol>
    </nav>
  </div>
  <div class="col-12 grid-margin">
  <div class="card-body">
        <h4 class="card-title">{{$client->nom}} {{$client->prenom}}</h4>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Client info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Client's Vendor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Client Contact</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                    <div class="media">
                        <img class="mr-3 w-25 rounded" src="{{ $client->image ? asset('storage/' . $client->image) : asset('../assets/images/faces/user.png') }}" alt="show client">
                        <div class="media-body">
                          <h4 class="mt-0">Informations :</h4> <br><br>
                          <label for="nom" class="text-primary">Nom : {{$client->nom}}</label><br>
                          <label for="prenom" class="text-primary">Prenom : {{$client->prenom}}</label><br>
                          <label for="Address" class="text-primary">Address : {{$client->adresse}}</label><br>
                          <label for="ville" class="text-primary">Ville : {{$client->ville}}</label>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="media">
                        <img class="mr-3 w-25 rounded" src="../assets/images/faces/face6.jpg" alt="sample image">
                        <div class="media-body">
                          <h4 class="mt-0">Vondeur info :</h4> <br><br>
                          <label for="nom" class="text-primary">Vondeur Nom : {{$client->vendeur->nom}}</label><br>
                          <label for="prenom" class="text-primary">Vondeur Prenom : {{$client->vendeur->prenom}}</label><br>
                          <label for="email" class="text-primary">contact : {{$client->vendeur->email}}</label><br>
                          <label for="tell" class="text-primary">Numero tel : {{$client->vendeur->tell}}</label>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                    <h4>Client's Contact : </h4><br><br>
                    <label for="tell" class="fa fa-phone text-info">Numero tel : {{$client->tell}}</label> <br>
                    <label for="email" class="far fa-envelope-open text-success">Email : {{$client->email}}</label>
                </div>
            </div>
    </div>
  </div>
</div>
@endsection