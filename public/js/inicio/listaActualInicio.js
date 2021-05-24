$(document).ready(function () {

    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Listas/obtenerListaActiva",
        dataType: "JSON",
        success: function (response) {
            ingredientesLista(response);
        }
    });


    function ingredientesLista(arrayLista) {

        var arrayAlimentos=arrayLista[0]["alimentosJSON"];

        let html = '<ul>';
        for (let index = 0; index < arrayAlimentos.length; index++) {
            html += '<li>' + arrayAlimentos[index]['cantidad'] + " " + arrayAlimentos[index]['descripcion'] + 'de ' + arrayAlimentos[index]['nombre'] + '</li>';
        }
        html += '</ul>';

        $("#listaActualInicio").empty();
        $("#listaActualInicio").append(html);
    }


})