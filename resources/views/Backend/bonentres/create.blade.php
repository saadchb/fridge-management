@extends('layouts.admin.app')
@section('title','Dachboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Form for creating a BonEntre -->
            <div class="card">
                <div class="card-header">Créer un bon d'entrée</div>
                <div class="card-body">
                    <form id="bonEntreForm" method="POST" action="{{ route('bonentres.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                            <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name="date"  required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_entre" class="col-md-4 col-form-label text-md-right">Date d'entrée</label>
                            <div class="col-md-6">
                                <input id="date_entre" type="date" class="form-control"  name="date_entre" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_sort" class="col-md-4 col-form-label text-md-right">Date de sortie</label>
                            <div class="col-md-6">
                                <input id="date_sort" type="date"  class="form-control" name="date_sort">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observation" class="col-md-4 col-form-label text-md-right">Observation</label>
                            <div class="col-md-6">
                                <textarea id="observation" class="form-control" name="observation" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendeur_id" class="col-md-4 col-form-label text-md-right">ID Vendeur</label>
                            <div class="col-md-6">
                                <select id="vendeur_id" class="form-control" name="vendeur_id" required>
                                    <option value="">Select ID Vendeur</option>
                                    @foreach($vendeurs as $vendeur)
                                    <option value="{{ $vendeur->id }}">{{ $vendeur->nom }} {{ $vendeur->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Form for creating DetailBonEntre -->
            <div class="card mt-4">
                <div class="card-header">Ajouter un détail de bon d'entrée</div>
                <div class="card-body">
                    <form id="detailBonEntreForm" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="conditionnement_id" class="col-md-4 col-form-label text-md-right">Conditionnement ID</label>
                            <div class="col-md-6">
                                <select id="conditionnement_id" class="form-control" name="conditionnement_id" required>
                                    <option value="">Select Conditionnement ID</option>
                                    @foreach($conditionnements as $conditionnement)
                                    <option value="{{ $conditionnement->id }}">{{ $conditionnement->conditionnement }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="produit_id" class="col-md-4 col-form-label text-md-right">Produit ID</label>
                            <div class="col-md-6">
                                <select id="produit_id" class="form-control" name="produit_id" required>
                                    <option value="">Select Produit ID</option>
                                    @foreach($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qte" class="col-md-4 col-form-label text-md-right">Quantité</label>
                            <div class="col-md-6">
                                <input id="qte" type="number" class="form-control" name="qte" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prix" class="col-md-4 col-form-label text-md-right">Prix</label>
                            <div class="col-md-6">
                                <input id="prix" type="text" class="form-control" name="prix" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="ajouterDetail()">Ajouter Détail Bon d'entrée</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table to display details of BonEntre -->
            <div class="card mt-4">
                <div class="card-header">Détails du Bon d'entrée</div>
                <div class="card-body">
                    <table class="table" id="detailTable">
                        <thead>
                            <tr>
                                <th>Conditionnement ID</th>
                                <th>Produit ID</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be dynamically added here -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="validerBonEntre()">Enregistrer Bon d'entrée</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let details = [];

    function ajouterDetail() {
        const conditionnement_id = $('#conditionnement_id').val();
        const produit_id = $('#produit_id').val();
        const qte = $('#qte').val();
        const prix = $('#prix').val();

        details.push({
            conditionnement_id,
            produit_id,
            qte,
            prix
        });

        const newRow = `
            <tr>
                <td>${conditionnement_id}</td>
                <td>${produit_id}</td>
                <td>${qte}</td>
                <td>${prix}</td>
                <td><button type="button" class="btn btn-danger" onclick="removeDetail(this)">Supprimer</button></td>
            </tr>
        `;

        $('#detailTable tbody').append(newRow);

        $('#detailBonEntreForm')[0].reset();
    }

    function removeDetail(button) {
        const row = $(button).closest('tr');
        const index = row.index();
        details.splice(index, 1);
        row.remove();
    }

    function validerBonEntre() {
        const bonEntreData = {
            date: $('#date').val(),
            date_entre: $('#date_entre').val(),
            date_sort: $('#date_sort').val(),
            observation: $('#observation').val(),
            vendeur_id: $('#vendeur_id').val(),
            details: details
        };

        $.ajax({
            url: '{{ route('bonentres.store') }}',
            type: 'POST',
            data: JSON.stringify(bonEntreData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Bon d\'entrée créé avec succès !');
                details = [];
                $('#detailTable tbody').empty();
                $('#bonEntreForm')[0].reset();
            },
            error: function() {
                alert('Erreur lors de la création du bon d\'entrée.');
            }
        });
    }
</script>

@endsection