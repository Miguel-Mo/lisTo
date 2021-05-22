$(document).ready(function () {

    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Listas/obtenerTodasListas",
        dataType: "JSON",
        success: function (response) {
            cardMaker(response);
        }
    });



    function cardMaker(response) {
        console.log(response);
        if (response.length > 0) {
            for (let index = 0; index < response.length; index++) {
                var check=response[index]['activo'];
                check==1?check='<i class="ml-2 fas fa-check"></i>':check="";
                let html = '<div class="col-12 col-md-6">' +
                    '<div class="card" style="background-color: #FFD454; color:black">' +
                    '<div class="card-header">' +
                    '<h5 class="card-title">'+response[index]["fechaCreacion"]+' </h5>'+check +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="row" id="r">' +
                    '<ul>' +
                    '<li>500 gr de tomates</li>' +
                    '<li>400 gr de lechuga</li>' +
                    '<li>300 gr de pistacho</li>' +
                    '</ul>' +

                    '</div>' +
                    '<div class="d-flex flex-row-reverse">' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-primary ml-1 editarReceta">Editar</a>' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-danger eliminarReceta">Eliminar</a>' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-success eliminarReceta">Marcar como principal</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    ' </div>';
                $("#contenedorListas").append(html);
            }
        }
    }

});