@extends('layouts.admin')

@section('title', 'Nouveau produit')

@section('content')
<h1 class="mb-4">Nouveau produit</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marque</label>
        <select name="brand_id" class="form-control">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Catégories</label><br>
        @foreach ($categories as $category)
            <div class="form-check form-check-inline">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input">
                <label class="form-check-label">{{ $category->nom }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection