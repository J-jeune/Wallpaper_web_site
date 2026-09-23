@extends('layouts.admin')

@section('title', 'Commande #' . $order->id)

@section('content')
<h1>Commande #{{ $order->id }}</h1>
<p>Client : {{ $order->user->name }} ({{ $order->user->email }})</p>
<p>Total : {{ $order->total }} €</p>

<h3 class="mt-4">Produits commandés</h3>
<ul>
    @foreach ($order->products as $product)
        <li>{{ $product->titre }} × {{ $product->pivot->quantite }} ({{ $product->pivot->prix_unitaire }} € pièce)</li>
    @endforeach
</ul>

<form action="{{ route('orders.update', $order->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Statut</label>
        <select name="statut" class="form-control">
            <option value="en attente" {{ $order->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
            <option value="payée" {{ $order->statut == 'payée' ? 'selected' : '' }}>Payée</option>
            <option value="expédiée" {{ $order->statut == 'expédiée' ? 'selected' : '' }}>Expédiée</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
</form>

<a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection