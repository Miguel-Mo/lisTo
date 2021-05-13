$(document).ready(function () {

    // id="contenedorAlimentos"
    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Tareas/obtenerTodosAlimentos",
        dataType: "JSON",
        success: function (response) {
            cardMaker(response);
        }
    });

    $("#buscadorAlimentos").keyup(function () {
        let filtro = $("#buscadorAlimentos").val();
        $.ajax({
            type: "POST",
            url: url + "/Tareas/obtenerFiltroAlimentos",
            dataType: "JSON",
            data: { filtro: filtro },
            success: function (response) {
                $("#contenedorAlimentos").empty()
                cardMaker(response);
            }
        });
    });

    function cardMaker(response) {
        if (response['Xdefecto'].length > 0) {
            for (let index = 0; index < response['Xdefecto'].length; index++) {
                let html = '<div class="col-lg-3 col-12">' +
                    '<div class="card card text-center">' +
                    '<div class="card-body">' +
                    '<b>' + response['Xdefecto'][index]['nombre'] + '</b> ' +
                    '<p>(' + response['Xdefecto'][index]['tipo'] + ')</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $("#contenedorAlimentos").append(html)
            }
        }
        if (response['Xusuario'].length > 0) {
            for (let index = 0; index < response['Xusuario'].length; index++) {
                let html = '<div class="col-lg-3 col-12">' +
                    '<div class="card card text-center">' +
                    '<div class="card-body">' +
                    '<b>' + response['Xusuario'][index]['nombre'] + '</b>' +
                    '<a href="#" class="btn btn-danger" id="dAlimento' + response['Xusuario'][index]['id'] + '" style="float: right;"><i class="fas fa-trash"></i></a>' +
                    '<p>(' + response['Xusuario'][index]['tipo'] + ')</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $("#contenedorAlimentos").append(html)

            }
        }


    }


    function myFunction() {
        console.log("hola");
    }


})