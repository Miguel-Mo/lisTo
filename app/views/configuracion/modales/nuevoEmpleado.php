<!-- Modal -->
<div class="modal fade" id="nuevoEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoEmpleadoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-kiki">
                <h5 class="modal-title" id="nuevoEmpleadoModalLabel">Añadir Nuevo Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNuevoEmpleado">
                <input type="hidden" id="idRolPersona" name="idRolPersona" value="3">
                    <div class="form-group">
                        <label for="nombrePersona">Nombre</label>
                        <input type="text" id="nombrePersona" name="nombrePersona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionPersona">Dirección</label>
                        <input type="text" id="direccionPersona" name="direccionPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoPersona">Teléfono</label>
                        <input type="text" id="telefonoPersona" name="telefonoPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="movilPersona">Móvil</label>
                        <input type="text" id="movilPersona" name="movilPersona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="emailPersona">Email</label>
                        <input type="text" id="emailPersona" name="emailPersona" class="form-control form-control-sm"
                            minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="docIdentidadPersona">DNI</label>
                        <input type="text" id="docIdentidadPersona" name="docIdentidadPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="numCuentaPersona">Nº Cuenta</label>
                        <input type="text" id="numCuentaPersona" name="numCuentaPersona"
                            class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="idCentroPersona">Centro</label>
                        <select id="idCentroPersona" name="idCentroPersona" class="form-control form-control-sm">
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
                <button type="submit" form="formNuevoEmpleado" class="btn btn-kiki">Generar</button>
            </div>
        </div>
    </div>
</div>