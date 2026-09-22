@extends('layouts.app')

@section('title', $brand->nom)

@section('content')
<h1>{{ $brand->nom }}</h1>
<h3 class="mt-4">Produits de cette marque</h3>
<ul>
    @foreach ($brand->products as $product)
        <li>{{ $product->titre }}</li>
    @endforeach
</ul>
<a href="{{ route('brands.index') }}" class="btn btn-secondary">Retour</a>
@endsection