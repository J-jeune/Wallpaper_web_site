@extends('layouts.app')

@section('title', 'Modifier la marque')

@section('content')
<h1 class="mb-4">Modifier la marque</h1>

<form action="{{ route('brands.update', $brand->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom', $brand->nom) }}">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection