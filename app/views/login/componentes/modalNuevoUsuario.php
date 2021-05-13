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
                <form class="form-signin" method="POST" autocomplete="off">
                    <br>
                    <label for="inputEmail" class="sr-only">Nombre</label>
                    <input type="text" id="inputNombreNuevo" name="nombreNuevo" class="form-control" placeholder="Nombre" required >
                    <br>
                    <label for="inputEmail" class="sr-only">Ciudad</label>
                    <input type="text" id="ship-address" name="direccionNuevo" class="form-control" autocomplete="off" placeholder="Ciudad" required  >
                    <br>
                    <label for=" inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmailNuevo" name="mailNuevo" class="form-control" placeholder="Email" required >
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPasswordNuevo" name="passNuevo" class="form-control" placeholder="Password" required>
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
$(document).ready(function () {
    $(document).on('click', '#registroUsuario', function (event) {
        alert("hola");
        let form=$("#form-signin").serialize();
        let url = $("#RUTA-URL").val();
        $.ajax({
            type: "POST",
            url: url + "/registroNuevoUsuario",
            data: {form:form},
            success: function (response) {
                
            }
        });

    });
});
</script>