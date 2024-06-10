@extends('layouts.admin.app')
@section('title','Bonlivrason')
@section('button_create')
<li class="nav-item d-none d-lg-flex">
  <a class="nav-link" href="{{route('bonlivrasons.create')}}">
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
     Les Bons des livrasons
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/bonlivrasons">Les Bons des livrasons</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
      </ol>
    </nav>
  </div>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Observation</th>
                                    <th>Vendeur</th>
                                    <th>Client</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bons as $bonLivrason)
                                    <tr>
                                        <td>{{ $bonLivrason->id }}</td>
                                        <td>{{ $bonLivrason->date }}</td>
                                        <td>{{ $bonLivrason->observation }}</td>
                                        <td>{{ $bonLivrason->vendeur->nom }} {{ $bonLivrason->vendeur->prenom }}</td>
                                        <td>{{ $bonLivrason->client->nom }} {{ $bonLivrason->client->prenom }}</td>
                                        <td>
                                            <a href="{{ route('bonlivrasons.show', $bonLivrason->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="{{ route('bonlivrasons.edit', $bonLivrason->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Modifier</a>
                                            <form action="{{ route('bonlivrasons.destroy', $bonLivrason->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bon de livraison ?')"><i class="fas fa-trash"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>@endif

@endsection