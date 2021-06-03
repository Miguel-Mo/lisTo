<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" id="formRegistro" method="POST" autocomplete="off">
                    <br>
                    <label for="inputNombreNuevo" class="sr-only">Nombre</label>
                    <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre" required>
                    <br>
                    <label for="direccionNuevo" class="sr-only">Ciudad</label>
                    <input type="text" id="direccionNuevo" name="direccionNuevo" class="form-control" autocomplete="off" placeholder="Ciudad" required>
                    <br>
                    <label for="mailNuevo" class="sr-only">Email</label>
                    <input type="email" id="mailNuevo" name="mailNuevo" class="form-control" placeholder="Email" required>
                    <br>
                    <label for="passNuevo" class="sr-only">Contraseña</label>
                    <input type="password" id="passNuevo" name="passNuevo" class="form-control" placeholder="Contraseña" required>
                    <br>
                    <label for="selectTipoAlimento" class="sr-only">Selecciona tipo de alimentación</label>
                    <select class="form-control" id="selectTipoAlimento" name="selectTipoAlimento">
                        <option disabled selected value="0">Selecciona tipo de alimentación</option>
                        <option value="1">Omnívora</option>
                        <option value="2">Vegetariana</option>
                        <option value="3">Piscivegetariana</option>
                        <option value="4">Ovolactovegetariano</option>
                    </select>
                    <br>
                    <!-- <button class="btn btn-lg btn-warning btn-block" type="submit">Entrar</button> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="registroUsuario">Registarme</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#registroUsuario', function(event) {
            if ($("#inputNombreNuevo").val() != "" && $("#direccionNuevo").val() != "" && $("#mailNuevo").val() != "" && $("#passNuevo").val() != "") {
                let form = $("#formRegistro").serialize();

                let url = $("#RUTA-URL").val();
                $.ajax({
                    type: "POST",
                    url: url + "/registroNuevoUsuario",
                    data: {
                        form: form
                    },
                    success: function(response) {
                        if (response == 1) {
                            alert("usuario registrado");
                            $('#registerModal').modal('hide');
                        } else if (response == 3) {
                            alert("Este correo ya está registrado, prueba con otro");
                        } else {
                            alert("Ha habido un error, prueba otra vez");
                        }

                    }
                });
            } else {
                alert('Introduce todos los campos, por favor');
            }
        });
    });
</script>