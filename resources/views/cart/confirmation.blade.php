@extends('layouts.app')

@section('title', 'Commande confirmée')

@section('content')
<h1>Merci pour votre commande !</h1>
<p>Commande n°{{ $order->id }} — Total : {{ $order->total }} €</p>

<ul>
    @foreach ($order->products as $product)
        <li>{{ $product->titre }} × {{ $product->pivot->quantite }} ({{ $product->pivot->prix_unitaire }} € pièce)</li>
    @endforeach
</ul>

<a href="/" class="btn btn-primary">Retour à l'accueil</a>
@endsection