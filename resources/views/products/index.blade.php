@extends('layouts.app')

@section('title', 'Accueil - Wallpapers')

@section('content')
<h1 class="mb-4">Nos Wallpapers</h1>

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
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