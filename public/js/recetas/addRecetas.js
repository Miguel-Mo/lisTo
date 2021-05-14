$(document).ready(function () {


    $('#ingredienteReceta1').select2({
        placeholder: "Ingrediente",
        allowClear: true
    });

    $('#unidadMedidaReceta1').select2({
        placeholder: "Medida",
        allowClear: true
    });
    $(document).on('click', '#addRecetaOpen', function (event) {
        cargarSelects();

    });

    function cargarSelects() {
        let url = $("#RUTA-URL").val();
        $.ajax({
            type: "POST",
            url: url + "/Alimentos/obtenerTiposyAlimentosRecetas",
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                for (let index = 0; index < response['unidades'].length; index++) {
                    var data = {
                        id: index + 1,
                        text: response['unidades'][index]['descripcion']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.selectUnidad').append(newOption).trigger('change');
                }

                for (let index = 0; index < response['defecto'].length; index++) {
                    var data = {
                        id: index + 1,
                        text: response['defecto'][index]['nombre']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.selectIngrediente').append(newOption).trigger('change');
                }

                for (let index = 0; index < response['usuario'].length; index++) {
                    var data = {
                        id: index + 1,
                        text: response['usuario'][index]['nombre']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.selectIngrediente').append(newOption).trigger('change');
                }
            }
        });
    }



    var contador = 1;
    $(document).on('click', '#addIngrediente', function (event) {

        contador++;
        let html = '<div class="col-6 mt-2">' +
            '<select class="selectIngrediente" style="width: 100%;" name="ingredienteReceta" id="ingredienteReceta' + contador + '" required>' +
            '<option></option>' +
            '</select>' +
            '</div>' +
            '<div class="col-3 mt-2">' +
            '<input type="text" name="cantidadReceta"  id="cantidadReceta' + contador + '" placeholder="Cantidad" class="form-control" required>' +
            '</div>' +
            '<div class="col-3 mt-2">' +
            '<select class="selectUnidad" style="width: 100% name="unidadMedidaReceta" id="unidadMedidaReceta' + contador + '" required>' +
            '<option></option>' +
            '</select>' +
            '</div>';
        $("#containerIngredientes").append(html);

        $('#ingredienteReceta' + contador + '').select2({
            placeholder: "Ingrediente",
            allowClear: true
        });

        $('#unidadMedidaReceta' + contador + '').select2({
            placeholder: "Medida",
            allowClear: true
        });
        cargarSelects();
    });

});