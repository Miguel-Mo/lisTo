<section class="col-12">
    <div class="row mb-2">
        <div class="col-lg-8 col-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Alimentos" id="buscadorAlimentos" aria-label="Alimentos">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-6 mt-1 mb-1">
            <div class="btn-group btn-group-toggle flex-wrap btn-block" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="checkbox" name="countries[]" value="1" autocomplete="off" onclick="filtrarTipo()"> <i class="fas fa-cheese"></i>
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="countries[]" value="2" autocomplete="off" onclick="filtrarTipo()"> <i class="fas fa-carrot"></i>
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="countries[]" value="3" autocomplete="off" onclick="filtrarTipo()"> <i class="fas fa-drumstick-bite"></i>
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="countries[]" value="4" autocomplete="off" onclick="filtrarTipo()"> <i class="fas fa-fish"></i>
                </label>
            </div>


        </div>

        <div class="col-lg-2 col-6">
            <button type="button" data-toggle="modal" href="" id="addAlimentoOpen" data-target="#addAlimentoModal" class="btn btn-warning btn-block">Añadir alimento</button>
        </div>
    </div>
    <div class="row" id="contenedorAlimentos">
        
        
    </div>

</section>