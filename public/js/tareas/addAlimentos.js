$(document).ready(function () {
    $('.js-example-basic-single').select2({
        placeholder: "Selecciona",
        allowClear: true
    });
    $(document).on('click', '#addAlimentoOpen', function (event) {
        let url = $("#RUTA-URL").val();
        $.ajax({
            type: "POST",
            url: url + "/Tareas/obtenerTiposAlimento",
            dataType:"JSON",
            success: function (response) {
                for (let index = 0; index < response['tipos'].length; index++) {
                    var data = {
                        id: index+1,
                        text: response['tipos'][index]['tipo']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('#categoria').append(newOption).trigger('change');
                }
                for (let index = 0; index < response['unidades'].length; index++) {
                    var data = {
                        id: index+1,
                        text: response['unidades'][index]['descripcion']
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('#unidadMedida').append(newOption).trigger('change');
                }
            }
        });

    });

});