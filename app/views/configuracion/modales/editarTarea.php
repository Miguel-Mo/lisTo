<!-- Modal -->
<div class="modal modal-choco fade" id="editarTareaModal" tabindex="-1" role="dialog"
    aria-labelledby="editarTareaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="editarTareaModalLabel">Editar Tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarTarea">
                    <input type="hidden" id="formEditarTareaId" name="idTarea">
                    <div class="form-group">
                        <label for="nombreTareaE">Nombre</label>
                        <input type="text" id="nombreTareaE" name="nombreTarea" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="minutosEstimadosTareaE">Tiempo Estimado en Minutos</label>
                        <input type="number" id="minutosEstimadosTareaE" name="minutosEstimadosTarea"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="idTipoTareaE">Tipo</label>
                        <select id="idTipoTareaE" name="idTipoTarea" class="form-control form-control-sm">
                            <?php foreach($datos['tareas_tipos'] as $tipos){ ?>
                            <option value="<?php echo $tipos->idTipoTarea; ?>">
                                <?php echo $tipos->nombreTipo; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idZonaTareaE">Zona</label>
                        <select id="idZonaTareaE" name="idZonaTarea" class="form-control form-control-sm">
                            <?php foreach($datos['zonas'] as $zona){ ?>
                            <option value="<?php echo $zona->idZona; ?>">
                                <?php echo $zona->nombreZona; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionTareaE">Descripcion</label>
                        <textarea id="descripcionTareaE" name="descripcionTarea"
                            class="form-control form-control-sm"></textarea>
                    </div>
                </form>
            </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="botonBorrarTarea">Borrar Tarea</button>
            <button type="submit" form="formEditarTarea" class="btn btn-kiki">Editar Tarea</button>
        </div>
        </div>
    </div>
</div>