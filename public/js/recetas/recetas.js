$(document).ready(function () {

    // id="contenedorAlimentos"
    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Recetas/obtenerTodasRecetas",
        dataType: "JSON",
        success: function (response) {
            cardMaker(response);
        }
    });

    $("#buscadorRecetas").keyup(function () {
        filtrar();
    });

    function filtrar() {
        let filtro = $("#buscadorRecetas").val();
        $.ajax({
            type: "POST",
            url: url + "/Recetas/obtenerFiltroRecetas",
            dataType: "JSON",
            data: { filtro: filtro },
            success: function (response) {
                $("#contenedorRecetas").empty()
                cardMaker(response);
            }
        });
    }
    //TODO ELIMINAR RECETAS Y ADD NO CARGA BIEN
    function cardMaker(response) {
        if (response.length > 0) {
            for (let index = 0; index < response.length; index++) {
                var dificultad = response[index]["dificultad"];
                dificultadFormated = dificultad == 1 ? 'Fácil <i class="fas fa-dot-circle" style="color: green;"></i>' : dificultad == 2 ? 'Normal <i class="fas fa-dot-circle" style="color: orange;"></i>' : 'Difícil <i class="fas fa-dot-circle" style="color: red;"></i>';
                let html = '<div class="col-12 col-md-6">' +
                    '<div class="card" style="background-color: #FFD454; color:black">' +
                    '<div class="card-header">' +
                    '<h5 class="card-title">' + response[index]["nombre"] + '</h5> ' +

                    '<div class="d-flex flex-row-reverse">' +
                    '<a class="m-2" data-toggle="collapse" data-target="#receta'+index+'"><i class="fas fa-plus"></i></a>'+
                    //<!-- <i class="fas fa-window-minimize"></i> -->
                    '</div>' +
                    '</div>' +
                    '<div class="card-body">' +

                    '<p class="card-text">Tiempo aproximado: ' + response[index]["tiempo"] + ' <br> Dificultad:' + dificultadFormated + '</p>' +
                    '<div class="row collapse" id="receta' + index + '">' +

                    '</div>' +
                    '<div class="d-flex flex-row-reverse">' +
                    '<a href="#" value='+response[index]["id"]+ ' class="btn card-link btn-primary ml-1 editarReceta">Editar Receta</a>' +
                    '<a href="#" value='+response[index]["id"]+ ' class="btn card-link btn-danger eliminarReceta">Eliminar Receta</a>' +
                    '<a type="button" value='+response[index]["id"]+ ' class="btn card-link btn-success ml-2 addListaTemp text-white"><i class="far fa-check-square"></i> Añadir a la lista</a>'+
                    ' </div>' +
                    '</div>' +
                    '</div>' +
                    ' </div>';
                $("#contenedorRecetas").append(html);
                let idReceta = response[index]['id'];
                ingredientes(idReceta, index);
            }
        }
    }

    function ingredientes(idReceta, index) {
        $.ajax({
            type: "POST",
            url: url + "/Recetas/obtenerAlimentosRecetas",
            data: { idReceta: idReceta },
            dataType: "JSON",
            success: function (ingredientes) {
                let html = '<div class="col-12">' +
                    '<ul>';
                for (let index = 0; index < ingredientes.length; index++) {
                    html += '<li>'+ingredientes[index]['nombre']+', '+ingredientes[index]['cantidad']+ ' ' + ingredientes[index]['descripcion']+'</li>';
                }
                html += '</ul>' +
                    '</div>' +
                    $("#receta" + index + "").append(html);


            }
        });
    }


    $(document).on('click', '.eliminarReceta', function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        eliminarReceta(id);
    });




    function eliminarReceta(id) {
        Swal.fire({
            title: '¿Seguro que quieres eliminar esta receta?',
            showCancelButton: true,
            confirmButtonText: `Si`,
        }).then((result) => {


            if (result['value'] == true) {

                $.ajax({
                    type: "POST",
                    url: url + "/Recetas/eliminarReceta",
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
                Swal.fire('La receta no ha sido eliminada', '', 'info')
            }
        })

    }

})