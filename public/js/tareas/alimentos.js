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
        filtrar();
    });

    $(document).on('click', '.filtradoTipos', function (event) {
        filtrar();
    });

    $(document).on('click', '.eliminarAlimento', function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        eliminarAlimento(id);
    });

    function filtrar() {
        let filtro = $("#buscadorAlimentos").val();
        let lacteo = $("#lacteo").val();
        let vegetal = $("#vegetal").val();
        let carne = $("#carne").val();
        let pescado = $("#pescado").val();
        $.ajax({
            type: "POST",
            url: url + "/Tareas/obtenerFiltroAlimentos",
            dataType: "JSON",
            data: { filtro: filtro, lacteo: lacteo, vegetal: vegetal, carne: carne, pescado: pescado },
            success: function (response) {
                $("#contenedorAlimentos").empty()
                cardMaker(response);
            }
        });
    }

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
                    '<a href="#" class="btn btn-danger eliminarAlimento" value=' + response['Xusuario'][index]['id'] + ' id="dAlimento' + response['Xusuario'][index]['id'] + '" style="float: right;" ><i class="fas fa-trash"></i></a>' +
                    '<p>(' + response['Xusuario'][index]['tipo'] + ')</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $("#contenedorAlimentos").append(html)

            }
        }
    }

    function eliminarAlimento(id) {
        Swal.fire({
            title: '¿Seguro que quieres eliminar este alimento?',
            showCancelButton: true,
            confirmButtonText: `Si`,
        }).then((result) => {


            if (result['value'] == true) {

                $.ajax({
                    type: "POST",
                    url: url + "/Tareas/eliminarAlimento",
                    data: { id: id },
                    success: function (response) {
                        if (response == 1) {
                            Swal.fire('Saved!', '', 'success').then((result) => {
                                result['value'] == true ? location.reload() : "";
                            })
                        }
                        else {
                            Swal.fire('Error!', '', 'info')
                        }
                    }
                });
            } else {
                Swal.fire('El alimento no ha sido eliminado', '', 'info')
            }
        })

    }

})