@extends('layouts.app')

@section('title', $product->titre)

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $product->titre }}</h1>
        <p class="text-muted">{{ $product->brand->nom }}</p>
        <p>{{ $product->description }}</p>

        <div class="mb-3">
            @foreach ($product->categories as $category)
                <span class="badge bg-secondary">{{ $category->nom }}</span>
            @endforeach
        </div>

        <p class="fs-3 fw-bold">{{ $product->prix }} €</p>

        <form action="/panier/ajouter/{{ $product->id }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Ajouter au panier</button>
        </form>

        <a href="/" class="btn btn-secondary mt-2">Retour</a>
    </div>
</div>
@endsection