@extends('layouts.admin')

@section('title', $product->titre)

@section('content')
<h1>{{ $product->titre }}</h1>
<p>{{ $product->description }}</p>
<p>Marque : {{ $product->brand->nom }}</p>
<p>Prix : {{ $product->prix }} €</p>
<p>Catégories :
    @foreach ($product->categories as $category)
        <span class="badge bg-secondary">{{ $category->nom }}</span>
    @endforeach
</p>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Retour</a>
@endsection