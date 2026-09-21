<h2 class="h5 mb-3">Informations du profil</h2>
<p class="text-muted mb-3">Modifiez le nom et l'email associés à votre compte.</p>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $user->name) }}" required autofocus>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $user->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm mb-1">
                    Votre adresse email n'est pas vérifiée.
                    <button form="send-verification" class="btn btn-link p-0">Cliquez ici pour renvoyer l'email de vérification.</button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <p class="text-success">Un nouveau lien de vérification a été envoyé.</p>
                @endif
            </div>
        @endif
    </div>

    <div class="d-flex align-items-center gap-2">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        @if (session('status') === 'profile-updated')
            <span class="text-success">Enregistré.</span>
        @endif
    </div>
</form>