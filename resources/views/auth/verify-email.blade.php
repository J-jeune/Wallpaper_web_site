@extends('layouts.app')

@section('title', 'Vérification de l\'email')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <p class="mb-4">Merci de vous être inscrit ! Avant de continuer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ? Si vous ne l'avez pas reçu, nous pouvons vous en renvoyer un.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        Un nouveau lien de vérification a été envoyé à l'adresse email fournie lors de l'inscription.
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Renvoyer l'email de vérification</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">Se déconnecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection