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
                var check = response[index]['activo'];
                check == 1 ? check = '<i class="ml-2 fas fa-check"></i>' : check = "";
                let html = '<div class="col-12 col-md-6">' +
                    '<div class="card" style="background-color: #FFD454; color:black">' +
                    '<div class="card-header">' +
                    '<h5 class="card-title">' + response[index]["tituloLista"] + ' </h5>' + check +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="row" id="ingredientesLista' + index + '">' +
                    '</div>' +
                    '<div class="d-flex flex-row-reverse">' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-primary ml-1 editarLista">Editar</a>' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-danger eliminarLista">Eliminar</a>' +
                    '<a href="#" value=' + response[index]["id"] + ' class="btn card-link btn-success principalLista">Marcar como principal</a>' +
                    '<button id="button1" onclick="CopyToClipboard(' + `'` + '#ingredientesLista' + index + `'` + ')">Click to copy</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    ' </div>';
                $("#contenedorListas").append(html);
                ingredientesLista(response[index]["alimentosJSON"], index);
            }
        }
    }

    function ingredientesLista(arrayAlimentos, index) {

        let html = '<ul>';
        for (let index = 0; index < arrayAlimentos.length; index++) {
            html += '<li>' + arrayAlimentos[index]['cantidad'] + " " + arrayAlimentos[index]['descripcion'] + ' de ' + arrayAlimentos[index]['nombre'] + '</li>';
        }
        html += '</ul>';


        $("#ingredientesLista" + index + "").append(html);
    }


    $(document).on('click', '.principalLista', function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        principalLista(id);
    });

    function principalLista(id) {
        $.ajax({
            type: "POST",
            url: url + "/Listas/principalLista",
            data: { id: id },
            success: function () {
                location.reload();
            }
        });
    }


    $(document).on('click', '.eliminarLista', function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        eliminarLista(id);
    });

    function eliminarLista(id) {
        Swal.fire({
            title: '¿Seguro que quieres eliminar esta lista?',
            showCancelButton: true,
            confirmButtonText: `Si`,
        }).then((result) => {
            if (result['value'] == true) {

                $.ajax({
                    type: "POST",
                    url: url + "/Listas/eliminarLista",
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
                Swal.fire('La lista no ha sido eliminada', '', 'info')
            }
        })

    }

    var contadorLista = 0;
    $(document).on('click', '.editarLista', function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: url + "/Listas/obtenerListaIndividual",
            dataType: "JSON",
            data: { id: id },
            success: function (response) {
                $("#tituloLista").empty();
                $("#listaEditarContenedor").empty();
                $("#idLista").val(id);

                let tituloLista = "";
                tituloLista = '<input class="form-control" name="tituloLista" style=" border:0;border-bottom: 1px solid;" value="' + response['tituloLista'] + '">';


                let html = "";
                for (let index = 0; index < response['alimentosJSON'].length; index++) {
                    html += '<div class="row"  id="listaInput' + index + '"  >' +
                        '<input required class="col-4" name="nuevaCantidad[]" style=" border:0;border-bottom: 1px solid;" type="text" value="' + response['alimentosJSON'][index]['cantidad'] + '">' +
                        '<input required class="col-4" name="nuevaDescripcion[]" style=" border:0;border-bottom: 1px solid;" type="text" value="' + response['alimentosJSON'][index]['descripcion'] + '">' +
                        '<input required class="col-4" name="nuevoNombre[]" style=" border:0;border-bottom: 1px solid;" type="text" value="' + response['alimentosJSON'][index]['nombre'] + '">' +
                        '</div>';
                    contadorLista = index;
                }

                $("#tituloLista").append(tituloLista);
                $("#listaEditarContenedor").append(html);
                $('#editListaModal').modal('toggle');
            }
        });

    });


    $(document).on('click', '#addInputLista', function (event) {

        contadorLista++;
        let html = "";
        html += '<div class="row"  id="listaInput' + contadorLista + '"  >' +
            '<input required class="col-4"  name="nuevaCantidad[]" style=" border:0;border-bottom: 1px solid;" type="text" value="" placeholder="Cantidad">' +
            '<input required class="col-4" name="nuevaDescripcion[]" style=" border:0;border-bottom: 1px solid;" type="text" value="" placeholder="Medida">' +
            '<input required class="col-4" name="nuevoNombre[]" style=" border:0;border-bottom: 1px solid;" type="text" value="" placeholder="Alimento">' +
            '</div>';

        $("#listaEditarContenedor").append(html);

    });


    $(document).on('click', '#removeInputLista', function (event) {
        console.log(contadorLista)
        contadorLista > 0 ? $('#listaInput' + contadorLista).remove() : "";
        contadorLista > 0 ? contadorLista-- : "";

    });




    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            alert("Text has been copied, now paste in the text-area")
        }
    }

});