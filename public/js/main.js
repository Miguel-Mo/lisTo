//Date range picker
$('#fechasTareas').daterangepicker();

$('.select2').select2();

cargarListaTemporal();

function cargarListaTemporal() {
    let url = $("#RUTA-URL").val();

    $.ajax({
        type: "POST",
        url: url + "/Listas/traerListaTemporal",
        dataType: "JSON",
        success: function (response) {
            let html = "";
            if (response.length > 0) {
                for (let index = 0; index < response.length; index++) {
                    html += '<li class="list-group-item d-flex justify-content-between align-items-center"  data-value=' + response[index]['id'] + ' style="color: black;">' +
                        response[index]['nombre'] +
                        '<span class="badge badge-choco badge-pill eli" data-value=' + response[index]['id'] + '><i class="fas fa-minus text-kiki"></i></span>' +
                        '</li>';
                }
            }
            $("#listaTemporal").empty();
            $("#listaTemporal").append(html);
        }
    });
}
function eliminarItemListaTemporal(idEliminar) {
    $.ajax({
        type: "POST",
        url: url + "/Listas/eliminarItemRecetasListaTemporal",
        data: { idEliminar: idEliminar },
        dataType: "JSON",
        success: function (response) {
            cargarListaTemporal();
        }
    });
}

$(document).on('click', '#guardarListaTemporal', function (event) {

    var arrayListIdsListaTemporal = [];
    $("#listaTemporal li").each(function () { arrayListIdsListaTemporal.push($(this).data("value")) });

    $.ajax({
        type: "POST",
        url: url + "/Listas/procesarListaTemporal",
        data: { arrayListIdsListaTemporal: arrayListIdsListaTemporal },
        dataType: "JSON",
        success: function (response) {
            Swal.fire({
                title: 'Lista guardada!',
                confirmButtonText: `Continuar`,
            }).then((result) => {
                location.reload();
            })

        }
    });

});

