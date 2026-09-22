@extends('layouts.app')

@section('title', 'Espace Admin')

@section('content')
<h1 class="mb-4">Espace Administrateur</h1>

<div class="row">
    <div class="col-md-3 mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary w-100 py-3">Produits</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary w-100 py-3">Catégories</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="{{ route('brands.index') }}" class="btn btn-outline-primary w-100 py-3">Marques</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100 py-3">Utilisateurs</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary w-100 py-3">Commandes</a>
    </div>
</div>
@endsection