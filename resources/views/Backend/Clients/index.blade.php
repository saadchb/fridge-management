@extends('layouts.admin.app')
@section('title','Client')
@section('button_create')
<li class="nav-item d-none d-lg-flex">
  <a class="nav-link" href="{{route('clients.create')}}">
    <span class="btn btn-primary">+ Ajouteé</span>
  </a>
</li>
@endsection

@section('content')
@if(session('success'))
<div id="toast-message" class="iziToast-wrapper iziToast-wrapper-topRight" style="margin-top: 60px;">
  <div class="iziToast-capsule" style="height: auto;">
    <div data-izitoast-ref="1713804820055" class="iziToast iziToast-theme-light iziToast-color-green iziToast-animateInside iziToast-opened iziToast-paused" id="SGVsbG8lMkMlMjB3b3JsZCFUaGlzJTIwYXdlc29tZSUyMHBsdWdpbiUyMGlzJTIwbWFkZSUyMGJ5JTIwaXppVG9hc3RncmVlbg">
      <div class="iziToast-body" style="padding-left: 33px;">
        <i class="iziToast-icon ico-success revealIn"></i>
        <div class="iziToast-texts">
          <strong class="iziToast-title slideIn" style="margin-right: 10px;">Success !</strong>
          <p class="iziToast-message slideIn">Done 👍</p>
        </div>
        <div></div>
      </div>
      <button type="button" class="iziToast-close"></button>
      <div class="iziToast-progressbar">
        <div style="transition: none 0s ease 0s; width: 0px;"></div>
      </div>
    </div>
  </div>
</div>
@else
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
     Les Clients
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/clients">Les Clients</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
      </ol>
    </nav>
  </div>
  <div class="container">
  <div class="row">
    @foreach($clients as $index => $client)
      <div class="col-6 col-sm-6 col-md-6 mb-4">
        <div class="card bg-light">
          <div class="card-header text-muted border-bottom-0">
            Client(e) Ajouté(e) le : {{$client->created_at}}
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b>{{$client->nom}} {{$client->prenom}}</b></h2>
                <p class="text-muted text-sm"><b>Vendeur : </b>{{$client->vendeur->nom}} {{$client->vendeur->prenom}} </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$client->adresse}}</li>
                  <br/>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:{{$client->tell}}</li>
                </ul>
              </div>
              <div class="col-5 text-center">
                <img src="{{ $client->image ? asset('storage/' . $client->image) : asset('../assets/images/faces/user.png') }}" alt="client" class="img-circle img-fluid">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="{{route('clients.edit', $client->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Modifier</a>
              <a href="{{route('clients.show', $client->id)}}" class="btn btn-sm btn-warning">
                <i class="fas fa-user"></i> Details
              </a>
              <form action="{{route('clients.destroy', $client->id)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      @if(($index + 1) % 2 == 0 && $index + 1 < count($clients))
        </div><div class="row">
      @endif
    @endforeach
  </div>
</div>

</div>@endif

@endsection