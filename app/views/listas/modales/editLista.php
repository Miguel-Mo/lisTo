<div class="modal fade" id="editListaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo RUTA_URL ?>/Listas/editListaSave" method="POST" autocomplete="off">
                <input type="hidden" id="idLista" name="idLista">
                <div class="modal-header">
                    <div id="tituloLista"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="listaEditarContenedor">

                </div>

                <div class="col-12 mt-2">
                    <div class="row text-center">

                        <div class="col-6" id="addInputLista">
                            <a class="btn"><i class="fas fa-plus-square fa-3x"></i></a>
                        </div>
                        <div class="col-6" id="removeInputLista">
                            <a class="btn"><i class="fas fa-minus-square fa-3x"></i></a>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="saveListaEditada" type="submit">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>