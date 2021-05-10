<!-- Modal -->
<div class="modal modal-choco fade" id="editarZonaModal" tabindex="-1" role="dialog"
    aria-labelledby="editarZonaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="editarZonaModalLabel">Editar Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarZona">
                    <input type="hidden" id="formEditarZonaId" name="idZona">
                    <div class="form-group">
                        <label for="nombreZonaE">Nombre</label>
                        <input type="text" id="nombreZonaE" name="nombreZona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="botonBorrarZona">Borrar Zona</button>
            <button type="submit" form="formEditarZona" class="btn btn-kiki">Editar Zona</button>
        </div>
        </div>
    </div>
</div>
</div>