@extends('layouts.app')

@section('title', 'Modifier la catégorie')

@section('content')
<h1 class="mb-4">Modifier la catégorie</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom', $category->nom) }}">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection