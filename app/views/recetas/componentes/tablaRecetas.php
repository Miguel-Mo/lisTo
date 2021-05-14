<section class="col-12">
    <div class="row mb-2">
        <div class="col-lg-10 col-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recetas" id="buscadorRecetas" aria-label="Recetas">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-12">
            <button type="button" data-toggle="modal" href="" id="addRecetaOpen" data-target="#addRecetaModal" class="btn btn-warning btn-block">Añadir receta</button>
        </div>
    </div>
    <div class="row" id="contenedorRecetas">
        <div class="col-6">
            <div class="card" style="background-color: #FFD454; color:black">
                <div class="card-header">
                    <h5 class="card-title">Titulo de la Receta</h5>

                    <div class="d-flex flex-row-reverse">
                        <a class="m-2" data-toggle="collapse" data-target="#receta1"><i class="fas fa-plus"></i></a>
                        <!-- <i class="fas fa-window-minimize"></i> -->
                    </div>
                </div>
                <div class="card-body">

                    <p class="card-text">Tiempo aproximado: 30 minutos <br> Dificultad:Fácil <i class="fas fa-dot-circle" style="color: green;"></i></p>
                    <div class="row collapse" id="receta1">
                        <div class="col-6">
                            <ul>
                                <li>Ingrediente 1</li>
                                <li>Ingrediente 2</li>
                                <li>Ingrediente 3</li>
                                <li>Ingrediente 4</li>
                                <li>Ingrediente 5</li>
                                <li>Ingrediente 6</li>
                                <li>Ingrediente 7</li>
                                <li>Ingrediente 8</li>

                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Ingrediente 1</li>
                                <li>Ingrediente 2</li>
                                <li>Ingrediente 3</li>
                                <li>Ingrediente 4</li>
                                <li>Ingrediente 5</li>
                                <li>Ingrediente 6</li>
                                <li>Ingrediente 7</li>
                                <li>Ingrediente 8</li>

                            </ul>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <a href="#" class="btn card-link btn-primary ml-1">Editar Receta</a>
                        <a href="#" class="btn card-link btn-danger">Eliminar Receta</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>