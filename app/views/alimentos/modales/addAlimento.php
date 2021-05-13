<div class="modal fade" id="addAlimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Alimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo RUTA_URL ?>/Alimentos/addNuevoAlimento" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="inputEmail">Nombre del Alimento</label>
                            <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre del Alimento" required>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="inputEmail">Categoría</label>
                            <select class="js-example-basic-single" name="categoria" id="categoria" required>
                                <option></option>
                            </select>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="inputEmail">Unidad de medida</label>
                            <select class="js-example-basic-single" name="unidadMedida" id="unidadMedida" required>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-lg btn-warning btn-block" type="submit">Añadir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>