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
            console.log(response);
            let html = "";
            if (response.length > 0) {
                for (let index = 0; index < response.length; index++) {
                    html += '<li class="list-group-item d-flex justify-content-between align-items-center"  style="color: black;">' +
                        response[index]['id'] +
                        '<span class="badge badge-choco badge-pill eli" data-value='+response[index]['id'] +'><i class="fas fa-check text-kiki"></i></span>' +
                        '</li>';
                }
            }
            $("#listaTemporal").empty();
            $("#listaTemporal").append(html);
        }
    });
}
function eliminarListaTemporal(idEliminar){
    $.ajax({
        type: "POST",
        url: url + "/Listas/eliminarRecetasListaTemporal",
        data: { idEliminar: idEliminar },
        dataType: "JSON",
        success: function (response) {
            console.log('llega');
        }
    });
}