<div class="modal fade" id="editRecetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="color: black;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Receta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo RUTA_URL ?>/Recetas/editNuevoReceta" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="nombreEdit">Nombre de la Receta</label>
                            <input type="text" id="nombreEdit" name="nombreNuevo" class="form-control" placeholder="Nombre del Receta" required>
                        </div>


                        <div class="col-12 mb-2">
                            <label for="dificultad">Dificultad</label>
                            <select name="dificultad" class="custom-select" id="dificultadEdit" required>
                                <option value="">Elige la dificultad</option>
                                <option value="1">Fácil</option>
                                <option value="2">Normal</option>
                                <option value="3">Difícil</option>
                            </select>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="tiempoReceta">Tiempo aproximado</label>
                            <select name="tiempoReceta" class="custom-select" id="tiempoEdit" required>
                                <option value="">Elige el tiempo aproximado</option>
                                <option value="1">15 minutos</option>
                                <option value="2">30 minutos</option>
                                <option value="3">45 minutos</option>
                                <option value="4">1 hora</option>
                                <option value="5">1 hora y media</option>
                                <option value="6">2 horas</option>
                            </select>
                        </div>

                        <!--cargar los alimentos tambien falta buscador en esta vista-->

                        <div class="col-6 mt-2">
                            <select class="selectIngredienteEdit" name="ingredienteReceta[]" id="ingredienteReceta1edit" required>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-3 mt-2">
                            <input type="text" name="cantidadReceta[]" id="cantidadReceta1edit" placeholder="Cantidad" class="form-control" required>
                        </div>
                        <div class="col-3 mt-2">
                            <select class="selectUnidadEdit" name="unidadMedidaReceta[]" id="unidadMedidaReceta1edit" required>
                                <option></option>
                            </select>
                        </div>


                        <div id="containerIngredientesEdit" class="row">
                        </div>
                        
                        <div class="col-12 mt-2">
                            <div class="row text-center">

                                <div class="col-6" id="addIngredienteEdit">
                                    <a class="btn"><i class="fas fa-plus-square fa-3x"></i></a>
                                </div>
                                <div class="col-6" id="deleteIngredienteEdit">
                                    <a class="btn"><i class="fas fa-minus-square fa-3x"></i></a>
                                </div>

                            </div>
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