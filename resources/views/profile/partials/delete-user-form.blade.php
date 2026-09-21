<h2 class="h5 mb-3 text-danger">Supprimer le compte</h2>
<p class="text-muted mb-3">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Téléchargez toute information que vous souhaitez conserver avant de continuer.</p>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
    Supprimer le compte
</button>

<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title">Êtes-vous sûr de vouloir supprimer votre compte ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Cette action est irréversible. Entrez votre mot de passe pour confirmer.</p>
                    <input id="password" name="password" type="password"
                           class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                           placeholder="Mot de passe">
                    @error('password', 'userDeletion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                </div>
            </form>
        </div>
    </div>
</div>