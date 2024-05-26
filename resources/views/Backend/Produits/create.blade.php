@extends('layouts.admin.app')
@section('title','Ajouteé Produit')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Produits</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Produits</a></div>
            <div class="breadcrumb-item">Ajoutée Prodduit</div>
        </div>
    </div>

    <div class="section-body">

        <h2 class="section-title">Ajoutee nouvelle Produit</h2>

        <div class="row">
            <div   class="col-12 col-md-12 col-lg-12">

                <div id="Receipt" class="card">
                    <form action="{{route('Produits.store')}}" class="mt-4" method="Post" enctype="multipart/form-data">
                        @csrf                
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="designation"><strong>nom du Produit :</strong></label>
                                    <input type="text" class="form-control" id="designation" placeholder="designation" name="designation">
                                    @error('designation')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="codebarre"><strong>Code Barre</strong></label>
                                    <input type="text"  name="codebarre" id="codebarre" class="form-control" value="{{ old('codebarre') }}">
                                    @error('codebarre')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="prix_ht"><strong>Prix regular</strong></label>
                                    <input type="text" name="prix_ht" id="prix_ht" class="form-control" >
                                    @error('prix_ht')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="prix_vente"><strong> Prix de vente</strong></label>
                                    <input type="text" name="prix_vente" id="prix_vente" class="form-control" value="{{ old('prix_vente') }}">
                                    @error('prix_vente')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label><strong>Sous-Famille </strong></label>
                                    <select class="form-control" name="sous_famille_id">
                                     @foreach($familles as $fam)
                                    <option value="{{$fam->id}}">{{$fam ->libelle}}</option>
                                    @endforeach
                                    </select>
                                    @error('prix_ht')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label><strong> Unite</strong></label>
                                    <select class="form-control"  name="unite_id">
                                    @foreach($Unites as $fam)
                                    <option value="{{$fam->id}}">{{$fam ->unite}}</option>
                                    @endforeach
                                    </select>
                                    @error('prix_ht')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label><strong> Marque</strong></label>
                                    <select class="form-control"  name="marque_id">
                                    @foreach($Marques as $fam)
                                    <option value="{{$fam->id}}">{{$fam ->marque}}</option>
                                    @endforeach
                                    </select>
                                    @error('prix_ht')
                                    <div class="text-danger m-2">{{ $message }}</div><br>
                                    @enderror
                                </div>

                            </div><br>


                            <div class="form-row">
                                <label> <strong>Image </strong></label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">choisir une image</label>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row col">
                            <label for="description"><strong>description :</strong></label>
                            <textarea type="text" placeholder="description" class="form-control" id="description" name="description"></textarea>
                            @error('description')
                            <div class="text-danger m-2">{{ $message }}</div><br>
                            @enderror
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Creé le Produit</button>
                            <a href="/Produits"class="btn btn-danger" >annuler</a>

                    <button id="print" onclick="printContent('Receipt');" class="btn btn-success ">
                        Print <span class="fas fa-print"></span>
                    </button>
                
                        </div>
                      
                    </form>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>

<script>
    window.onload = function() {
        var codebarreInput = document.getElementById('codebarre');
        if (codebarreInput.value.trim() === '') {
            // Generate a random 12-digit code and set it as the value of the input field
            codebarreInput.value = generateCodeBar();
        }
    }

    function generateCodeBar() {
        // Generate a random 12-digit code
        return Math.floor(100000000000 + Math.random() * 900000000000);
    }
</script>
<script>
    function printContent(el) {
        var restorepage = $('.section').html();
        var printcontent = $('#' + el).clone();
        $('.section').empty().html(printcontent);
        window.print();
        $('.section').html(restorepage);
    }
</script>
<!-- <script>
    function printContent(el) {
        var printContents = document.getElementById(el).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script> -->
@endsection