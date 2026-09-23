@extends('layouts.admin')

@section('title', 'Modifier le produit')

@section('content')
<h1 class="mb-4">Modifier le produit</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" value="{{ old('titre', $product->titre) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix', $product->prix) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Image actuelle</label><br>
        <img src="{{ asset('images/products/' . $product->image) }}" width="150" class="mb-2"><br>
        <label class="form-label">Changer l'image (laisser vide pour garder l'actuelle)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marque</label>
        <select name="brand_id" class="form-control">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Catégories</label><br>
        @foreach ($categories as $category)
            <div class="form-check form-check-inline">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"
                       {{ $product->categories->contains($category->id) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $category->nom }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection