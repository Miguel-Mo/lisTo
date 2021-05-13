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
                    <label for="passNuevo" class="sr-only">Password</label>
                    <input type="password" id="passNuevo" name="passNuevo" class="form-control" placeholder="Password" required>
                    <br>
                    <!-- <button class="btn btn-lg btn-warning btn-block" type="submit">Entrar</button> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="registroUsuario">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
// queda cifrar la contraseña y comprobar que ese email no esta cogido ya
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
                        response == 1 ? alert("usuario registrado") : alert("Ha habido un error vuelve a intentarlo");
                    }
                });
            } else {
                alert('Introduce todos los campos, por favor');
            }
        });
    });
</script>