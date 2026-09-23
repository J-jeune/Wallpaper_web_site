@extends('layouts.admin')

@section('title', 'Commandes')

@section('content')
<h1 class="mb-4">Gestion des commandes</h1>

<table class="table admin-table">
    <thead>
        <tr>
            <th>N°</th>
            <th>Client</th>
            <th>Total</th>
            <th>Statut</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="fw-semibold">#{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td class="fw-bold">{{ $order->total }} €</td>
                <td>
                    @if ($order->statut == 'payée')
                        <span class="badge bg-success">{{ $order->statut }}</span>
                    @elseif ($order->statut == 'expédiée')
                        <span class="badge bg-primary">{{ $order->statut }}</span>
                    @else
                        <span class="badge bg-warning text-dark">{{ $order->statut }}</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="bi bi-eye"></i> Voir
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection