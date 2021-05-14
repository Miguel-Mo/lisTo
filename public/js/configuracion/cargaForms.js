// CONFIGURACION MODAL
function cargarForm(url, id, modal, form) {
    $.ajax({
        type: 'POST',
        url: url,
        data: { id: id },
        success: function(datos) {
            console.log(datos);
            const json = JSON.parse(datos)
            console.log(form, json);
            $("#" + form + " input").each(function() {
                let name = $(this).attr("name")
                if (name !== "clave" && name !== "password")
                    $(this).val(json[name])
                console.log(name, json[name]);
            })
            $("#" + form + " textarea").each(function() {
                let name = $(this).attr("name")
                if (name !== "clave" && name !== "password")
                    $(this).val(json[name])
                console.log(name, json[name]);
            })
            $("#" + form + " select").each(function() {
                let name = $(this).attr("name")
                $(this).val(json[name]).trigger('change')
            })
            $("#" + modal).modal("toggle");
        }
    })
}


function rowlinkModal(idTable) {
    $('#' + idTable + ' td.row-link').each(function() {
        // idconsole.log($(this).parent().data("id"))
        $(this).css('cursor', 'pointer').hover(
            function() {
                $(this).parent().addClass('active');
            },
            function() {
                $(this).parent().removeClass('active');
            }).click(function() {
            const idModal = $(this).parent().attr('data-modal');
            const idElemento = $(this).parent().attr('data-id');

            if (idTable === "usuarios-table") {
                cargarForm("./Usuarios/obtenerUsuario", idElemento, idModal, "formEditarUsuario");
            } else if (idTable === "empleados-table") {
                cargarForm("./Empleados/obtenerEmpleado", idElemento, idModal, "formEditarEmpleado");
            } else if (idTable === "tareas-table") {
                cargarForm("./Tareas/obtenerTarea", idElemento, idModal, "formEditarTarea");
            } else if (idTable === "zonas-table") {
                cargarForm("./Zonas/obtenerZona", idElemento, idModal, "formEditarZona");
            } else if (idTable === "tareas-personas-table") {
                cargarForm("./TareasEmpleado/obtenerTareaPersona", idElemento, idModal, "formEditarTareaGestor");
            } else {

            }
        });
    });
}

jQuery(document).ready(function($) {
    rowlinkModal("usuarios-table");
    rowlinkModal("empleados-table");
    rowlinkModal("tareas-table");
    rowlinkModal("zonas-table");
    rowlinkModal("tareas-personas-table");
});