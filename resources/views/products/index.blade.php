@extends('layouts.app')

@section('title', 'Accueil - Wallpapers')

@section('content')
<h1 class="mb-4">Nos Wallpapers</h1>
<h3 class="mb-3">🆕 Derniers ajouts</h3>
<div class="row mb-5">
    @foreach ($recents as $product)
        <div class="col-md-3 mb-3">
            <div class="card h-100 rounded-4 overflow-hidden border-primary">
                <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $product->titre }}">
                <div class="card-body p-2">
                    <p class="mb-1 fw-bold">{{ $product->titre }}</p>
                    <p class="text-muted small mb-1">{{ $product->brand->nom }}</p>
                    <a href="/produits/{{ $product->id }}" class="btn btn-sm btn-outline-primary w-100">Voir</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<hr class="mb-4">

<form method="GET" action="/" class="row mb-4">
    <div class="col-md-4">
        <select name="brand" class="form-control" onchange="this.form.submit()">
            <option value="">Toutes les marques</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <select name="category" class="form-control" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <a href="/" class="btn btn-outline-secondary">Réinitialiser</a>
    </div>
</form>

<div class="masonry">
    @foreach ($products as $product)
        <div class="masonry-item">
            <div class="card">
                <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->titre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->titre }}</h5>
                    <p class="text-muted">{{ $product->brand->nom }}</p>
                    <p class="fw-bold">{{ $product->prix }} €</p>

                    @foreach ($product->categories as $category)
                        <span class="badge bg-secondary">{{ $category->nom }}</span>
                    @endforeach
                    <a href="/produits/{{ $product->id }}" class="btn btn-primary btn-sm mt-2">Voir</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
.masonry {
    column-count: 3;
    column-gap: 1rem;
}
.masonry-item {
    break-inside: avoid;
    margin-bottom: 1rem;
}
@media (max-width: 768px) {
    .masonry {
        column-count: 2;
    }
}
@media (max-width: 480px) {
    .masonry {
        column-count: 1;
    }
}
</style>
@endsection