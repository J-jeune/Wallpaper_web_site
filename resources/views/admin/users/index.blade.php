@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
<h1 class="mb-4">Gestion des utilisateurs</h1>

<table class="table admin-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Statut</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="fw-semibold">{{ $user->name }}</td>
                <td class="text-muted">{{ $user->email }}</td>
                <td>
                    @if ($user->is_admin)
                        <span class="badge bg-success"><i class="bi bi-shield-check"></i> Admin</span>
                    @else
                        <span class="badge bg-light text-dark">Client</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
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