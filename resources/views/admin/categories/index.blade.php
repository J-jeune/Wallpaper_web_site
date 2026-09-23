@extends('layouts.admin')

@section('title', 'Catégories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Nouvelle catégorie
    </a>
</div>

<table class="table admin-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td class="fw-semibold">
                    <span class="badge bg-secondary">{{ $category->nom }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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