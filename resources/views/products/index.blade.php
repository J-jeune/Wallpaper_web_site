@extends('layouts.app')

@section('title', 'Accueil - Wallpapers')

@section('content')
<h1 class="mb-4">Nos Wallpapers</h1>

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

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->titre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->titre }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="text-muted">{{ $product->brand->nom }}</p>
                    <p class="fw-bold">{{ $product->prix }} €</p>

                    @foreach ($product->categories as $category)
                        <span class="badge bg-secondary">{{ $category->nom }}</span>
                    @endforeach
                    <a href="/produits/{{ $product->id }}" class="btn btn-primary btn-sm">Voir</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection