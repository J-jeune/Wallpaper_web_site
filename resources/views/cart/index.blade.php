@extends('layouts.app')

@section('title', 'Panier')

@section('content')
<h1 class="mb-4">Mon Panier</h1>

@if (count($items) === 0)
    <p>Votre panier est vide.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item['product']->titre }}</td>
                    <td>{{ $item['quantite'] }}</td>
                    <td>{{ $item['sous_total'] }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="fs-4 fw-bold">Total : {{ $total }} €</p>
@endif

<form action="/panier/valider" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Valider la commande</button>
</form>

@endsection