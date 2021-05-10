<!-- Modal -->
<div class="modal modal-choco fade" id="editarUsuarioModal" tabindex="-1" role="dialog"
    aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarUsuario">
                    <input type="hidden" id="formEditarUsuarioId" name="idUsuario">
                    <div class="form-group">
                        <label for="nombreUsuarioE">Nombre</label>
                        <input type="text" id="nombreUsuarioE" name="nombreUsuario" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailUsuarioE">Email</label>
                        <input type="text" id="emailUsuarioE" name="emailUsuario" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordE">Password</label>
                        <input type="text" id="passwordE" name="password" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="botonBorrarUsuario">Eliminar Usuario</button>
                <button type="submit" form="formEditarUsuario" class="btn btn-kiki">Editar Usuario</button>
            </div>
        </div>
    </div>
</div>