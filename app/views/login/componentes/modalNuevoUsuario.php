<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo RUTA_URL ?>/Login/acceder" method="POST" autocomplete="off">
                    <br>
                    <label for="inputEmail" class="sr-only">Nombre</label>
                    <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre" required >
                    <br>
                    <label for="inputEmail" class="sr-only">Ciudad</label>
                    <input type="text" id="ship-address" name="ship-address" class="form-control" autocomplete="off" placeholder="Ciudad" required  >
                    <br>
                    <label for=" inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmailNuevo" name="mailNuevo" class="form-control" placeholder="Email" required >
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPasswordNuevo" name="passNuevo" class="form-control" placeholder="Password" required>
                    <br>
                    <button class="btn btn-lg btn-warning btn-block" type="submit">Entrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB78SmW7P0bh8pZBOdz-n_cF_mxl59cVzM&callback=initAutocomplete&libraries=places&v=weekly" async></script>
            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        </div>
    </div>
</div>