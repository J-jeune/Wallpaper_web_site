@extends('layouts.app')

@section('title', 'Admin - Marques')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des marques</h1>
    <a href="{{ route('brands.create') }}" class="btn btn-primary">Nouvelle marque</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->nom }}</td>
                <td>
                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
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