@extends('layouts.admin')

@section('title', 'Produits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Nouveau produit
    </a>
</div>

<table class="table admin-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Marque</th>
            <th>Prix</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td><img src="{{ asset('images/products/' . $product->image) }}" width="50" height="50" class="rounded-circle" style="object-fit: cover;"></td>
                <td class="fw-semibold">{{ $product->titre }}</td>
                <td><span class="badge bg-secondary">{{ $product->brand->nom }}</span></td>
                <td class="fw-bold">{{ $product->prix }} €</td>
                <td class="text-end">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection