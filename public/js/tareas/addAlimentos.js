$(document).ready(function () {
    $('.js-example-basic-single').select2();
    $(document).on('click','#addAlimentoModal',function(event) {
        let url=$("#RUTA-URL").val();
        $.ajax({
            type: "POST",
            url: url+"/Tareas/obtenerTiposAlimento",
            success: function (response) {
                console.log(response);
            }
        });

    });

});