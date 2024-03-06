@extends('index')
@section('section')
<h2>Modification du livre </h2>
<form action="modif" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titre" class="form-label">Titre du livre</label>
      <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titre" value="{{ $livre->titre }}">
    </div>
    <div class="mb-3">
      <label for="resume" class="form-label">Resumé</label>
      <input type="text" class="form-control" id="resume" name="resume" value="{{ $livre->resume }}">
    </div>
    <div class="mb-3">
      <label for="prix" class="form-label">Prix du livre</label>
      <input type="text" class="form-control" id="prix" name="prix" value="{{ $livre->prix }}">
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select name="categorie_id" id="categorie" class="form-select">
        @foreach ($categories as $categ)
            <option @if ($categ->id == $livre->categorie_id) selected @endif
            value="{{ $categ->id }}">{{ $categ->libelle }}</option>
        @endforeach
        </select>
      </div>
    <div class="mb-3">
        @if ($livre->image)
            <img src="{{ url('/images/'.$livre->image) }}" alt="Image" width="300" /><br />
        @endif 
        <input type="hidden" class="form-control" name="oldimage" value="{{ $livre->image }}">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
    <input type="hidden" name="idlivre" value="{{ $livre->id }}">

    @csrf
  </form>
@stop
