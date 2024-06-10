@extends('layouts.admin.app')
@section('title','Ajouteé Produit')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="col-lg-12 ">
            <!-- Form for creating a BonEntre -->
            <div class="card">
                <div class="card-header">Créer un bon de sortie</div>
                <div class="card-body">
                    <form id="bonSortForm" method="POST" action="{{ route('bonsorts.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" required autofocus>
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
                                        <option value="{{ $vendeur->id }}">{{ $vendeur->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Form for creating DetailBonSort -->
            <div class="card mt-4">
                <div class="card-header">Ajouter un détail de bon de sortie</div>
                <div class="card-body">
                    <form id="detailBonSortForm" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="conditionnement_id" class="col-md-4 col-form-label text-md-right">Conditionnement ID</label>
                            <div class="col-md-6">
                                <select id="conditionnement_id" class="form-control" name="conditionnement_id" required>
                                    <option value="">Select Conditionnement ID</option>
                                    @foreach($conditionnements as $conditionnement)
                                        <option value="{{ $conditionnement->id }}">{{ $conditionnement->id }}</option>
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
                                        <option value="{{ $produit->id }}">{{ $produit->id }}</option>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="ajouterDetail()">Ajouter Détail Bon de sortie</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table to display details of BonSort -->
            <div class="card mt-4">
                <div class="card-header">Détails du Bon de sortie</div>
                <div class="card-body">
                    <table class="table" id="detailTable">
                        <thead>
                            <tr>
                                <th>Conditionnement ID</th>
                                <th>Produit ID</th>
                                <th>Quantité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be dynamically added here -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="validerBonSort()">Enregistrer Bon de sortie</button>
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

        details.push({ conditionnement_id, produit_id, qte });

        const newRow = `
            <tr>
                <td>${conditionnement_id}</td>
                <td>${produit_id}</td>
                <td>${qte}</td>
                <td><button type="button" class="btn btn-danger" onclick="removeDetail(this)">Supprimer</button></td>
            </tr>
        `;

        $('#detailTable tbody').append(newRow);

        $('#detailBonSortForm')[0].reset();
    }

    function removeDetail(button) {
        const row = $(button).closest('tr');
        const index = row.index();
        details.splice(index, 1);
        row.remove();
    }

    function validerBonSort() {
        const bonSortData = {
            date: $('#date').val(),
            observation: $('#observation').val(),
            vendeur_id: $('#vendeur_id').val(),
            details: details
        };

        $.ajax({
            url: '{{ route('bonsorts.store') }}',
            type: 'POST',
            data: JSON.stringify(bonSortData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Bon de sortie créé avec succès !');
                
                details = [];
                $('#detailTable tbody').empty();
                $('#bonSortForm')[0].reset();
            },
            error: function() {
                alert('Erreur lors de la création du bon de sortie.');
            }
        });
    }
</script>

@endsection
