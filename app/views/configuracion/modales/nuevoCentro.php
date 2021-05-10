<!-- Modal -->
<div class="modal fade" id="nuevoCentroModal" tabindex="-1" role="dialog" aria-labelledby="nuevoCentroModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="nuevoCentroModalLabel">Añadir Nuevo Centro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNuevoCentro">
                    <div class="form-group">
                        <label for="nombreCentro">Nombre</label>
                        <input type="text" id="nombreCentro" name="nombreCentro" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionCentro">Dirección</label>
                        <input type="text" id="direccionCentro" name="direccionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="poblacionCentro">Población</label>
                        <input type="text" id="poblacionCentro" name="poblacionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="cifCentro">Cif</label>
                        <input type="text" id="cifCentro" name="cifCentro" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoCentro">Teléfono</label>
                        <input type="text" id="telefonoCentro" name="telefonoCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailAdministracionCentro">Email Administración</label>
                        <input type="text" id="emailAdministracionCentro" name="emailAdministracionCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailPedidosCentro">Email Pedidos</label>
                        <input type="text" id="emailPedidosCentro" name="emailPedidosCentro"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="formNuevoCentro" class="btn btn-kiki">Generar</button>
            </div>
        </div>
    </div>
</div>