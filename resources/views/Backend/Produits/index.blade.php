@extends('layouts.admin.app')
@section('title','Ajouteé Produit')
@section('content')
<br>

<section class="section">
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

    @endif
    <div class="section-body">
        <h2 class="section-title">list du Produit</h2>

        <div class="row sortable-card ui-sortable">
            @if ($produits->isEmpty())
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Empty Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="empty-state" data-height="400" style="height: 400px;">
                                <div class="empty-state-icon" style="background-color: #e7391e;"><i class="fas fa-question"></i></div>
                                <h2>We couldn't find any product</h2>
                                <p class="lead">Sorry we can't find any data, to get rid of this message, make at least 1 entry.</p>
                                <a href="{{route('Produits.create')}}" class="btn btn-primary btn-lg mt-4" style="background-color: #e7391e;border: none;font-size: large;">Create new One</a>
                            </div>
                        </div>
                    </div>
                </div>
               
            @else
                @foreach ($produits as $item)
                    <div class="col-12 col-md-6 col-lg-4" style="position: relative; opac4ity: 1; left: 0px; top: 0px;">
                        <div class="card card-danger">
                            <div class="card-header ui-sortable-handle " style="padding: 4px; display: flex; justify-content: center; align-items: center; ">
                                <img src="{{asset('storage/'.$item->image)}}" style="height: 15rem ; width: 17rem;border-radius: 2px;" class="article-image img-fluid "> <span class="course-label" style="position: absolute;left: 20px;top: 20px;background: #fff;padding: 2px 10px;border-radius: 5px;font-weight: 700;color: #385777;border: 1px solid #F3F5F9;">{{$item->codebarre}}</span>
                            </div>
                            <div class="card-body ">
                                @foreach($sous_familles as $souFam)
                                @if($souFam->id == $item->sous_famille_id)
                                <p style="float: right;">{{$souFam->libelle}}</p>
                                @endif
                                @endforeach
                                <!-- <p style="float: right;">sous_famille</p> -->

                                <a href="#" style="color: #3e2d58;">
                                    <h5 class="card-title">{{$item->designation}} </h5>
                                </a>
                                <p class="card-text">{{$item->description}}</p>
                            </div>


                            <div class="card-footer " style="margin-top: -14px; ">
                                <form id="delete-form-{{$item->id}}" action="{{route('Produits.destroy',$item->id)}}" method="Post">
                                    <a href="{{route('Produits.edit', $item->id)}}" class="btn btn-primary text-right">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- <a href="{{route('Produits.show', $item->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a> -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-right" onclick='confirmation(event,`{{ $item->id }}`)' data-toggle="modal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    @if($item->prix_vente && !$item->prix_ht)
                                    <h4 style="float: right;">{{$item->prix_vente}} <span style="font-size: medium;"> DH </span></h4>
                                    @endif

                                    @if($item->prix_vente && $item->prix_ht)
                                    <div style="float: right;">
                                        <h4>
                                            <ins>
                                                <span class="price-amount" style="  display: inline-block;text-decoration: none;">
                                                    {{$item->prix_vente}} <span class="currencySymbol" style="font-size: medium;">DH</span>
                                                </span>
                                            </ins>
                                            <del>
                                                <span class="price-amount" style="  text-decoration: line-through;color: #aaaaaa;font-size: 14px;display: inline-block;font-weight: 600;">
                                                    {{$item->prix_ht}}<span class="currencySymbol">DH</span>
                                                </span>
                                            </del>
                                        </h4>
                                    </div>
                                    @endif


                                    <!-- <div class="price ">
                                        <ins>
                                            <span class="price-amount" style="  line-height: 24px; color: #aaaaaa;font-size: 14px;display: inline-block;font-weight: 600;text-decoration: none;">
                                                <span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <center> @if ($produits->lastPage() > 1)
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            @if ($produits->previousPageUrl())
                            <li class="page-item "><a class="page-link" href="{{ $produits->previousPageUrl() }}" tabindex="-1"><i class="fas fa-chevron-left"></i></a></li>
                            @endif

                            @for ($i = max(1, $produits->currentPage() - 2); $i <= min($produits->lastPage(), $produits->currentPage() + 2); $i++)
                                <li class="page-item @if ($i == $produits->currentPage()) active @endif"><a class="page-link">{{ $i }} <span class="sr-only"></span></a></li>

                                @endfor
                                @if ($produits->nextPageUrl())
                                <li class="page-item"><a class="page-link" href="{{ $produits->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
                                @endif
                        </ul>
                    </nav>
                    @endif
                </center>

            @endif
    </div>
</section>

@endsection