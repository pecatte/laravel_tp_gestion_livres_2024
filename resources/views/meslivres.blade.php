@extends('index')
@section('section')
<h2>Liste de mes livres </h2>
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Résumé</th><th>Prix</th><th></th><th></th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td>{{ $livre->titre }}</a></td>
     <td>{{ $livre->resume }}</td>
     <td>{{ $livre->prix }}</td>
     <td><a class="btn btn-warning" href="modifier?idlivre={{ $livre->id }}">Modifier</a></td>
     <td><a class="btn btn-danger" onclick="return confirm('Vous êtes sur ?')" href="supprimer?idlivre={{ $livre->id }}">Supprimer</a></td>
    </tr>
    @endforeach
</table>
@stop
