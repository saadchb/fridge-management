@extends('layouts.admin.app')
@section('title','Produits')
@section('button_create')
<li class="nav-item d-none d-lg-flex">
  <a class="nav-link" href="{{route('produits.create')}}">
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
     Les Produits
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/produits">Les Produits</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
      </ol>
    </nav>
  </div>
  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Produits</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    Image
                  </th>
                  <th>
                    Designation
                  </th>
                  <th>
                    Famille
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($produits as $produit)
                <tr>
                  <td class="py-1">
                  @if ($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="Image de produit" class="img-lg rounded-circle mb-2">
                  @else
                    Aucune image disponible                      
                  @endif
                  </td>
                  <td class="py-1">
                    {{$produit->designation}}
                  </td>
                  <td>
famille                  </td>
                  <td>
                     <a href="{{route('produits.edit', $produit->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt btn-icon-append"></i> Modifier</a>
                     <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette produit ?')"><i class="fas fa-trash"></i> Supprimer</button>
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