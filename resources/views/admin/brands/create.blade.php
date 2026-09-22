@extends('layouts.app')

@section('title', 'Nouvelle marque')

@section('content')
<h1 class="mb-4">Nouvelle marque</h1>

<form action="{{ route('brands.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection