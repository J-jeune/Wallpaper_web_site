@extends('layouts.admin')

@section('title', 'Marques')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des marques</h1>
    <a href="{{ route('brands.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Nouvelle marque
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
        @foreach ($brands as $brand)
            <tr>
                <td class="fw-semibold">
                    <span class="badge bg-dark">{{ $brand->nom }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
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