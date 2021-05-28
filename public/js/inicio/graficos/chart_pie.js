$(document).ready(function () {
    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Inicio/obtenerDatosGauge",
        dataType: "JSON",
        success: function (response) {
            if (response.length != 0) {
                var chartPie = c3.generate({
                    bindto: '#pie',
                    data: {
                        // iris data from R
                        columns: response,
                        type: 'pie',
                        onclick: function (d, i) { console.log("onclick", d, i); },
                        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                    },
                    size: {
                        height: 250
                    }
                })
            }else{
                html="<h3 style='color:black;'>No hay gráficos disponibles</h3>"
                $("#pie").append(html);
            }
        }
    });
})

