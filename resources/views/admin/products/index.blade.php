@extends('layouts.app')

@section('title', 'Admin - Produits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Nouveau produit</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->titre }}</td>
                <td>{{ $product->brand->nom }}</td>
                <td>{{ $product->prix }} €</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection