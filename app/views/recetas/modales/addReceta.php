<div class="modal fade" id="addRecetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="color: black;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Receta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo RUTA_URL ?>/Recetas/addNuevoReceta" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="inputEmail">Nombre de la Receta</label>
                            <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre del Receta" required>
                        </div>


                        <div class="col-12 mb-2">
                            <label for="dificultad">Dificultad</label>
                            <select class="custom-select" required>
                                <option value="">Elige la dificultad</option>
                                <option value="1">Fácil</option>
                                <option value="2">Normal</option>
                                <option value="3">Difícil</option>
                            </select>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="tiempoReceta">Tiempo aproximado</label>
                            <select class="custom-select" required>
                                <option value="">Elige el tiempo aproximado</option>
                                <option value="1">15 minutos</option>
                                <option value="2">30 minutos</option>
                                <option value="3">45 minutos</option>
                                <option value="4">1 hora</option>
                                <option value="5">1 hora y media</option>
                                <option value="6">2 horas</option>
                            </select>
                        </div>
                        
                        <!--proximo dia insertar alimentos tambien borrar en el select los ingredientes cada vez
                        que añadimos uno nuevo y cargar los alimentos tambien falta buscador en esta vista-->

                        <div class="col-6 mt-2">
                            <select class="selectIngrediente" name="ingredienteReceta" id="ingredienteReceta1" required>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-3 mt-2">
                            <input type="text" name="cantidadReceta"  id="cantidadReceta1" placeholder="Cantidad" class="form-control" required>
                        </div>
                        <div class="col-3 mt-2">
                            <select class="selectUnidad" name="unidadMedidaReceta" id="unidadMedidaReceta1" required>
                                <option></option>
                            </select>
                        </div>


                        <div id="containerIngredientes" class="row">
                        </div>

                        <div id="addIngrediente" class="col-12 mt-2 text-center">
                            <a class="btn"><i class="fas fa-plus-square fa-3x"></i></a>
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