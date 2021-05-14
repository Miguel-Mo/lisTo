function ajaxPostAndReload(url, object) {
    $.ajax({
        type: 'POST',
        url: url,
        data: object,
        success: function(ev) {
            //console.log(ev);
            // $("#lista-asignados").load(window.location.href + " #lista-asignados > ul");
            // $("#nuevoClienteModal").modal("toggle");

            window.location.reload();
        }
    });
}

function confirmationAndReload(url, object, title, text) {
    Swal.fire({
        title: '<span style="color: #343a40;">' + title + '</span>',
        text: text,
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<span style="font-weight: 400;">Confirmar</span>',
        cancelButtonText: '<span style="font-weight: 400;">Cancelar</span>',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed || result.value != 'false') {
            Swal.fire({
                title: '<span style="color: #343a40;">Confirmar acción</span>',
                text: '¿Estás seguro que quieres realizar esta acción?. No podrás deshacer los cambios.',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<span style="font-weight: 400;">Confirmar</span>',
                cancelButtonText: '<span style="font-weight: 400;">Cancelar</span>',
                reverseButtons: true
            }).then((res) => {
                if (res.isConfirmed || res.value != 'false') {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: object,
                        success: function(response) {
                            if ((response !== "") && ($.isNumeric(response))) {
                                // $("#fases-funnel").load(window.location.href + " #fases-funnel > div");
                                window.location.reload();
                            } else {
                                Swal.fire(
                                    '<span style="color: #343a40;">Ups!</span>',
                                    'Algo ha salido mal. Comprueba que puedas realizar esta acción.',
                                )
                            }
                        }
                    })
                }
            })

        }
    })
}

function megaCrudHandlerCrusher(idFormNuevo, idFormEditar, urlNuevo, urlEditar, urlBorrar, idBoton, idInput, title, text) {

    // NUEVO
    $(idFormNuevo).submit(function(e) {
        e.preventDefault();
        let sentform = '';

        // if (idFormNuevo == '#formNuevoTipoExpediente') {
        sentform = $(idFormNuevo).serialize();
        // } else {
        //     sentform = $(idFormNuevo).serializeArray();
        // }
        //console.log(sentform);
        ajaxPostAndReload(urlNuevo, { form: sentform })
    });

    // EDITAR
    $(idFormEditar).submit(function(e) {
        e.preventDefault();
        let sentform = '';

        // if (idFormEditar == '#formEditarTipoExp') {
        sentform = $(idFormEditar).serialize();
        // } else {
        //     sentform = $(idFormEditar).serializeArray();
        // }
        ajaxPostAndReload(urlEditar, { form: sentform })
    });

    // BORRAR
    $(idBoton).on("click", function() {
        let id = $(idBoton).parent().parent().find(idInput).val()
        confirmationAndReload(urlBorrar, { id: id }, title, text)
    });
}

// USUARIO
$(document).ready(() => {

    // USUARIO
    megaCrudHandlerCrusher("#formNuevoUsuario", "#formEditarUsuario", "./Usuarios/nuevoUsuario",
        "./Usuarios/editarUsuario", "./Usuarios/borrarUsuario", "#botonBorrarUsuario", "#formEditarUsuarioId", "Borrar usuario",
        "¿Estás seguro de que quieres borrar este usuario?")

    // Empleados
    megaCrudHandlerCrusher("#formNuevoEmpleado", "#formEditarEmpleado", "./Empleados/nuevoEmpleado",
        "./Empleados/editarEmpleado", "./Empleados/borrarEmpleado", "#botonBorrarEmpleado", "#formEditarEmpleadoId", "Borrar Empleado",
        "¿Estás seguro de que quieres borrar este empleado?")

    // Zonas
    megaCrudHandlerCrusher("#formNuevaZona", "#formEditarZona", "./Zonas/nuevaZona",
        "./Zonas/editarZona", "./Zonas/borrarZona", "#botonBorrarZona", "#formEditarZonaId", "Borrar Zona",
        "¿Estás seguro de que quieres borrar esta Zona?")

    // GESTOR DE TAREAS
    megaCrudHandlerCrusher("#formNuevaTareaGestor", "#formEditarTareaGestor", "./TareasEmpleado/nuevaTarea",
        "./TareasEmpleado/editarTarea", "./TareasEmpleado/borrarTarea", "#botonBorrarTareaPersona", "#formEditarTareaPersonaId", "Borrar Tarea",
        "¿Estás seguro de que quieres borrar esta Tarea?")


});