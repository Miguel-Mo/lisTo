$(document).ready(function () {


    $('#ingredienteReceta1edit').select2({
        placeholder: "Ingrediente",
        allowClear: true
    });

    $('#unidadMedidaReceta1edit').select2({
        placeholder: "Medida",
        allowClear: true
    });

    $(document).on('click', '.editarReceta', async function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        await cargarSelects();
        $.ajax({
            type: "POST",
            url: url + "/Recetas/obtenerRecetaIndividual",
            dataType: "JSON",
            data: { id: id },
            success: function (response) {
                console.log(response);
                $('#nombreEdit').val(response['receta']['nombre']);
                $('#dificultadEdit').val(response['receta']['dificultad']);
                $('#tiempoEdit').val(response['receta']['tiempo']);

                $('#ingredienteReceta1edit').val(parseInt(response['alimentos'][0]['idAlimento']));
                $('#ingredienteReceta1edit').trigger('change');
                $('#cantidadReceta1edit').val(response['alimentos'][0]['cantidad']);
                $('#unidadMedidaReceta1edit').val(parseInt(response['alimentos'][0]['idUnidadMedida']));
                $('#unidadMedidaReceta1edit').trigger('change');


//                 ingredienteReceta1edit
// cantidadReceta1edit
// unidadMedidaReceta1edit



                $('#editRecetaModal').modal('toggle');
            }
        });



    });

    async function cargarSelects() {
        let url = $("#RUTA-URL").val();
        await $.ajax({
            type: "POST",
            url: url + "/Alimentos/obtenerTiposyAlimentosRecetas",
            dataType: "JSON",
            success: function (response) {
                for (let index = 0; index < response['unidades'].length; index++) {
                    var data = {
                        id: index + 1,
                        text: response['unidades'][index]['descripcion']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.selectUnidadEdit').append(newOption).trigger('change');
                }

                for (let index = 0; index < response['defecto'].length; index++) {
                    var data = {
                        id: response['defecto'][index]['id'],
                        text: response['defecto'][index]['nombre']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.selectIngredienteEdit').append(newOption).trigger('change');
                }
            }
        });
    }



    var contadorEdit = 1;
    $(document).on('click', '#addIngrediente', function (event) {

        contadorEdit++;
        let html = '<div class="col-6 mt-2 ingrediente' + contadorEdit + '">' +
            '<select class="selectIngredienteEdit " style="width: 100%;" name="ingredienteReceta[]" id="ingredienteReceta' + contadorEdit + '" required>' +
            '<option></option>' +
            '</select>' +
            '</div>' +
            '<div class="col-3 mt-2 ingrediente' + contadorEdit + '">' +
            '<input type="text" name="cantidadReceta[]"  id="cantidadReceta' + contadorEdit + '" placeholder="Cantidad" class="form-control" required>' +
            '</div>' +
            '<div class="col-3 mt-2 ingrediente' + contadorEdit + '">' +
            '<select class="selectUnidadEdit" style="width: 100%" name="unidadMedidaReceta[]" id="unidadMedidaReceta' + contadorEdit + '" required>' +
            '<option></option>' +
            '</select>' +
            '</div>';
        $("#containerIngredientes").append(html);

        $('#ingredienteReceta' + contadorEdit + 'edit').select2({
            placeholder: "Ingrediente",
            allowClear: true
        });

        $('#unidadMedidaReceta' + contadorEdit + 'edit').select2({
            placeholder: "Medida",
            allowClear: true
        });
        cargarSelects();
    });


    $(document).on('click', '#deleteIngredienteEdit', function (event) {
        contadorEdit>1?$('.ingrediente' + contadorEdit ).remove():"";
        contadorEdit>1?contadorEdit--:"";
        
    });

});