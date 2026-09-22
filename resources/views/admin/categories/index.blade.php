@extends('layouts.app')

@section('title', 'Admin - Catégories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Nouvelle catégorie</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->nom }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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