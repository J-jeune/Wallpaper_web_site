<h2 class="h5 mb-3">Modifier le mot de passe</h2>
<p class="text-muted mb-3">Assurez-vous d'utiliser un mot de passe long et aléatoire pour rester en sécurité.</p>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="update_password_current_password" class="form-label">Mot de passe actuel</label>
        <input id="update_password_current_password" name="current_password" type="password"
               class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
               autocomplete="current-password">
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password" class="form-label">Nouveau mot de passe</label>
        <input id="update_password_password" name="password" type="password"
               class="form-control @error('password', 'updatePassword') is-invalid @enderror"
               autocomplete="new-password">
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">Confirmer le mot de passe</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
               class="form-control" autocomplete="new-password">
    </div>

    <div class="d-flex align-items-center gap-2">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        @if (session('status') === 'password-updated')
            <span class="text-success">Enregistré.</span>
        @endif
    </div>
</form>