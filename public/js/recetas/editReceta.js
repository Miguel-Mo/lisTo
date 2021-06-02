$(document).ready(function () {


    $('#ingredienteReceta0Edit').select2({
        placeholder: "Ingrediente",
        allowClear: true
    });

    $('#unidadMedidaReceta0Edit').select2({
        placeholder: "Medida",
        allowClear: true
    });


    $(document).on('click', '.editarReceta', async function (event) {
        event.preventDefault();
        let id = $(this).attr("value");
        await cargarSelectsEdit();
        $.ajax({
            type: "POST",
            url: url + "/Recetas/obtenerRecetaIndividual",
            dataType: "JSON",
            data: { id: id },
            success: async function (response) {
                $("#containerIngredientesEdit").html('');
                $('#idRecetaEdit').val(id)
                $('#nombreEdit').val(response['receta']['nombre']);
                $('#dificultadEdit').val(response['receta']['dificultad']);
                $('#tiempoEdit').val(response['receta']['tiempo']);

                $('#ingredienteReceta0Edit').val(parseInt(response['alimentos'][0]['idAlimento']));
                $('#ingredienteReceta0Edit').trigger('change');
                $('#cantidadReceta0Edit').val(response['alimentos'][0]['cantidad']);
                $('#unidadMedidaReceta0Edit').val(parseInt(response['alimentos'][0]['idUnidadMedida']));
                $('#unidadMedidaReceta0Edit').trigger('change');

                for (let index = 1; index < response['alimentos'].length; index++) {
                    
                    let html = '<div class="col-6 mt-2 ingrediente' + index + 'Edit">' +
                        '<select class="selectIngredienteEdit" style="width: 100%;" name="ingredienteReceta[]" id="ingredienteReceta' + index + 'Edit" required>' +
                        '<option></option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="col-3 mt-2 ingrediente' + index + 'Edit">' +
                        '<input type="text" name="cantidadReceta[]"  id="cantidadReceta' + index + 'Edit" placeholder="Cantidad" class="form-control" required>' +
                        '</div>' +
                        '<div class="col-3 mt-2 ingrediente' + index + 'Edit">' +
                        '<select class="selectUnidadEdit" style="width: 100%" name="unidadMedidaReceta[]" id="unidadMedidaReceta' + index + 'Edit" required>' +
                        '<option></option>' +
                        '</select>' +
                        '</div>';
                    $("#containerIngredientesEdit").append(html);
            
                    $('#ingredienteReceta' + index + 'Edit').select2({
                        placeholder: "Ingrediente",
                        allowClear: true
                    });
            
                    console.log('#ingredienteReceta' + index + 'Edit')
                    $('#unidadMedidaReceta' + index + 'Edit').select2({
                        placeholder: "Medida",
                        allowClear: true
                    });
 
                    await cargarSelectsEdit();

                    $('#ingredienteReceta'+index+'Edit').val(parseInt(response['alimentos'][index]['idAlimento']));
                    $('#ingredienteReceta'+index+'Edit').trigger('change');
                    $('#cantidadReceta'+index+'Edit').val(response['alimentos'][index]['cantidad']);
                    $('#unidadMedidaReceta'+index+'Edit').val(parseInt(response['alimentos'][index]['idUnidadMedida']));
                    $('#unidadMedidaReceta'+index+'Edit').trigger('change');
                    
                }

                $('#editRecetaModal').modal('toggle');
            }
        });



    });

    async function cargarSelectsEdit() {
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


    


    $(document).on('click', '#addIngredienteEdit', function (event) {
        var contadorEdit=0;
        $('.selectIngredienteEdit').each(function(){
            contadorEdit++;
        })
        
        let html = '<div class="col-6 mt-2 ingrediente' + contadorEdit + 'Edit">' +
            '<select class="selectIngredienteEdit " style="width: 100%;" name="ingredienteReceta[]" id="ingredienteReceta' + contadorEdit + 'Edit" required>' +
            '<option></option>' +
            '</select>' +
            '</div>' +
            '<div class="col-3 mt-2 ingrediente' + contadorEdit + 'Edit">' +
            '<input type="text" name="cantidadReceta[]"  id="cantidadReceta' + contadorEdit + 'Edit" placeholder="Cantidad" class="form-control" required>' +
            '</div>' +
            '<div class="col-3 mt-2 ingrediente' + contadorEdit + 'Edit">' +
            '<select class="selectUnidadEdit" style="width: 100%" name="unidadMedidaReceta[]" id="unidadMedidaReceta' + contadorEdit + 'Edit" required>' +
            '<option></option>' +
            '</select>' +
            '</div>';
        $("#containerIngredientesEdit").append(html);

        $('#ingredienteReceta' + contadorEdit + 'Edit').select2({
            placeholder: "Ingrediente",
            allowClear: true
        });

        $('#unidadMedidaReceta' + contadorEdit + 'Edit').select2({
            placeholder: "Medida",
            allowClear: true
        });
        cargarSelectsEdit();
    });


    $(document).on('click', '#deleteIngredienteEdit', function (event) {
        var contadorEdit=0;
        $('.selectIngredienteEdit').each(function(){
            contadorEdit++;
        })
        console.log(contadorEdit)
        contadorEdit>1?$('.ingrediente' + (contadorEdit-1)+'Edit' ).remove():"";
        
    });

});