let url = $("#RUTA-URL").val();

$(document).ready(function () {
    $(document).on('click', '.addListaTemp', function (event) {
        let idReceta = $(this).attr("value");

        $.ajax({
            type: "POST",
            url: url + "/Listas/insertRecetasToListaTemporal",
            data: { idReceta: idReceta },
            dataType: "JSON",
            success: function (response) {
                cargarListaTemporal();
                cargarBurbujaTemporal();
            }
        });

    })

    $(document).on('click', '.eli', function (event) {
        let idEliminar = $(this).data("value");
        eliminarItemListaTemporal(idEliminar);

    })
});






