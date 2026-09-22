@extends('layouts.app')

@section('title', 'Admin - Commandes')

@section('content')
<h1 class="mb-4">Gestion des commandes</h1>

<table class="table">
    <thead>
        <tr>
            <th>N°</th>
            <th>Client</th>
            <th>Total</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->total }} €</td>
                <td>{{ $order->statut }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">Voir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection