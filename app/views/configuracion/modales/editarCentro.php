<!-- Modal -->
<div class="modal modal-choco fade" id="editarCentroModal" tabindex="-1" role="dialog"
    aria-labelledby="editarCentroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="editarCentroModalLabel">Editar Centro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarCentro">
                <input type="hidden" id="formEditarCentroId" name="idCentro">
                    <div class="form-group">
                        <label for="nombreCentroE">Nombre</label>
                        <input type="text" id="nombreCentroE" name="nombreCentro" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionCentroE">Dirección</label>
                        <input type="text" id="direccionCentroE" name="direccionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="poblacionCentroE">Población</label>
                        <input type="text" id="poblacionCentroE" name="poblacionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="cifCentroE">Cif</label>
                        <input type="text" id="cifCentroE" name="cifCentro" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoCentroE">Teléfono</label>
                        <input type="text" id="telefonoCentroE" name="telefonoCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailAdministracionCentroE">Email Administración</label>
                        <input type="text" id="emailAdministracionCentroE" name="emailAdministracionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailPedidosCentroE">Email Pedidos</label>
                        <input type="text" id="emailPedidosCentroE" name="emailPedidosCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="botonBorrarCentro">Eliminar Centro</button>
                <button type="submit" form="formEditarCentro" class="btn btn-kiki">Editar Centro</button>
            </div>
        </div>
    </div>
</div>