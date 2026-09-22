@extends('layouts.app')

@section('title', 'Modifier l\'utilisateur')

@section('content')
<h1 class="mb-4">Modifier {{ $user->name }}</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
        <label class="form-check-label" for="is_admin">Administrateur</label>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection