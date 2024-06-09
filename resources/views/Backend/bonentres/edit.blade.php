@extends('layouts.admin.app')
@section('title','Dachboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Modifier un Bon d'Entrée
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bonentres.update', $bonEntre->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $bonEntre->date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date_entre">Date d'Entrée</label>
                                <input type="date" name="date_entre" id="date_entre" class="form-control" value="{{ $bonEntre->date_entre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date_sort">Date de Sortie</label>
                                <input type="date" name="date_sort" id="date_sort" class="form-control" value="{{ $bonEntre->date_sort }}" required>
                            </div>
                            <div class="form-group">
                                <label for="observation">Observation</label>
                                <textarea name="observation" id="observation" class="form-control" required>{{ $bonEntre->observation }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="vendeur_id">Vendeur</label>
                                <select name="vendeur_id" id="vendeur_id" class="form-control" required>
                                    @foreach($vendeurs as $vendeur)
                                        <option value="{{ $vendeur->id }}" {{ $vendeur->id == $bonEntre->vendeur_id ? 'selected' : '' }}>{{ $vendeur->nom }} {{ $vendeur->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
