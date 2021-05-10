

<!-- Modal -->
<div class="modal fade" id="nuevaTareaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaTareaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-kiki">
        <h5 class="modal-title" id="nuevaTareaModalLabel">Añadir Nueva Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formNuevaTarea">
                    <div class="form-group">
                        <label for="nombreTarea">Nombre</label>
                        <input type="text" id="nombreTarea" name="nombreTarea" class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="minutosEstimadosTarea">Tiempo Estimado en Minutos</label>
                        <input type="number" id="minutosEstimadosTarea" name="minutosEstimadosTarea" class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="idTipoTarea">Tipo</label>
                        <select id="idTipoTarea" name="idTipoTarea" class="form-control form-control-sm">
                        <?php foreach($datos['tareas_tipos'] as $tipos){ ?>
                        <option value="<?php echo $tipos->idTipoTarea; ?>">
                                <?php echo $tipos->nombreTipo; ?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idZonaTarea">Zona</label>
                        <select id="idZonaTarea" name="idZonaTarea" class="form-control form-control-sm">
                        <?php foreach($datos['zonas'] as $zona){ ?>
                        <option value="<?php echo $zona->idZona; ?>">
                                <?php echo $zona->nombreZona; ?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionTarea">Descripcion</label>
                        <textarea id="descripcionTarea" name="descripcionTarea" class="form-control form-control-sm"></textarea>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="formNuevaTarea" class="btn btn-kiki">Generar</button>
      </div>
    </div>
  </div>
</div>