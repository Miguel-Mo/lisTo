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
                <form class="form-signin" action="<?php echo RUTA_URL ?>/Login/acceder" method="POST" autocomplete="off">
                    <br>
                    <label for="inputEmail" class="sr-only">Nombre del Alimento</label>
                    <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre del Alimento" required >
                    <br>
                    <label for="inputEmail" class="sr-only">Categoría</label>
                    <input type="text" id="categoriaAl" name="catgeoriaAl" class="form-control" autocomplete="off" placeholder="Categoria" required  >
                    <br>

                    <button class="btn btn-lg btn-warning btn-block" type="submit">Añadir</button>
                </form>
            </div>
        </div>
    </div>
</div>