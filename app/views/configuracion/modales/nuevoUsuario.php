<!-- Modal -->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="nuevoUsuarioModalLabel">Añadir Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form id="formNuevoUsuario">                
                <input type="hidden" id="idRolUsuario" name="idRolUsuario" value="1">
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre</label>
                        <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailUsuario">Email</label>
                        <input type="text" id="emailUsuario" name="emailUsuario" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="formNuevoUsuario" class="btn btn-kiki">Generar</button>
            </div>
        </div>
    </div>
</div>