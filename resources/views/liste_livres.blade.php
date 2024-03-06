@extends('index')
@section('section')
<h2>Liste des livres</h2>
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Résumé</th><th>Prix</th><th>Categorie</th><th></th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td>{{ $livre->titre }}</a></td>
     <td>{{ $livre->resume }}</td>
     <td>{{ $livre->prix }}</td>
     <td>{{ $livre->categorie->libelle }}</td>
     <td>{{ $livre->user->name }}</td>
    </tr>
    @endforeach
</table>
@stop
