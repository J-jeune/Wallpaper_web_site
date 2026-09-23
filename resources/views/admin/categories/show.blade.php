@extends('layouts.admin')

@section('title', $category->nom)

@section('content')
<h1>{{ $category->nom }}</h1>
<h3 class="mt-4">Produits dans cette catégorie</h3>
<ul>
    @foreach ($category->products as $product)
        <li>{{ $product->titre }}</li>
    @endforeach
</ul>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
@endsection