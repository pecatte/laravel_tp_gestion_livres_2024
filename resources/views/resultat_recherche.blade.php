@extends('index')
@section('section')
<h2>Résultat de la recherche </h2>
@if (count($livres)==0)
  <h4>Aucun livre trouvé...</h4>
@else
<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>Résumé</th><th>Prix</th></tr>
    </thead>
    @foreach ($livres as $livre)
    <tr>
     <td>{{ $livre->titre }}</a></td>
     <td>{{ $livre->resume }}</td>
     <td>{{ $livre->prix }}</td>
    </tr>
    @endforeach
</table>
@endif 
@stop
