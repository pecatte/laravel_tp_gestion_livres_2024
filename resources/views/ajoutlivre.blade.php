@extends('index')
@section('section')
<h2>Ajout d'un nouveau livre </h2>
<form action="ajout" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="titre" class="form-label">Titre du livre</label>
      <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titre">
    </div>
    <div class="mb-3">
      <label for="resume" class="form-label">Resumé</label>
      <input type="text" class="form-control" id="resume" name="resume">
    </div>
    <div class="mb-3">
      <label for="prix" class="form-label">Prix du livre</label>
      <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select name="categorie_id" id="categorie" class="form-select">
            <option value="0">Aucune</option>
        @foreach ($categories as $categ)
            <option value="{{ $categ->id }}">{{ $categ->libelle }}</option>
        @endforeach    
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
    @csrf
  </form>
@stop
