$(document).ready(function () {

    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Listas/obtenerListaActiva",
        dataType: "JSON",
        success: function (response) {
            if(response!=0){
                ingredientesLista(response);
            }else{
                $("#listaActualInicio").append("<p>No hay lista asignada</p>");
            }
        }
    });


    function ingredientesLista(arrayLista) {
        var arrayAlimentos = arrayLista["alimentosJSON"];
        let html = '<ul>';
        for (let index = 0; index < arrayAlimentos.length; index++) {
            html += '<li>' + arrayAlimentos[index]['cantidad'] + " " + arrayAlimentos[index]['descripcion'] + 'de ' + arrayAlimentos[index]['nombre'] + '</li>';
        }
        html += '</ul>';

        $("#listaActualInicio").empty();
        $("#listaActualInicio").append(html);
    }


})