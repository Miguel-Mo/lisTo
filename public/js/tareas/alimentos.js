$(document).ready(function () {

    // id="contenedorAlimentos"
    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Tareas/obtenerTodosAlimentos",
        success: function (response) {
            console.log(response);
        }
    });


})