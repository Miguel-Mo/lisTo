

<!-- Modal -->
<div class="modal modal-choco fade" id="editarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="editarEmpleadoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-kiki">
        <h5 class="modal-title" id="editarEmpleadoModalLabel">Editar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formEditarEmpleado">
                <input type="hidden" id="formEditarEmpleadoId" name="idPersona">
                    <div class="form-group">
                        <label for="nombrePersonaE">Nombre</label>
                        <input type="text" id="nombrePersonaE" name="nombrePersona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionPersonaE">Dirección</label>
                        <input type="text" id="direccionPersonaE" name="direccionPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoPersonaE">Teléfono</label>
                        <input type="text" id="telefonoPersonaE" name="telefonoPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="movilPersonaE">Móvil</label>
                        <input type="text" id="movilPersonaE" name="movilPersona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailPersonaE">Email</label>
                        <input type="text" id="emailPersonaE" name="emailPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="docIdentidadPersonaE">DNI</label>
                        <input type="text" id="docIdentidadPersonaE" name="docIdentidadPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="numCuentaPersonaE">Nº Cuenta</label>
                        <input type="text" id="numCuentaPersonaE" name="numCuentaPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="idCentroPersonaE">Centro</label>
                        <select id="idCentroPersonaE" name="idCentroPersona" class="form-control form-control-sm">
                            <?php foreach($datos['centros'] as $centro){ ?>
                            <option value="<?php echo $centro->idCentro; ?>">
                                <?php echo $centro->nombreCentro; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="botonBorrarEmpleado">Eliminar Empleado</button>
                <button type="submit" form="formEditarEmpleado" class="btn btn-kiki">Editar Empleado</button>
            </div>
    </div>
  </div>
</div>