$(document).ready(function () {
    let url = $("#RUTA-URL").val();
    $.ajax({
        type: "POST",
        url: url + "/Inicio/obtenerDatosDonut",
        dataType: "JSON",
        success: function (response) {
            if(response.length!=0){
                var chart = c3.generate({
                    bindto: '#donut',
                    data: {
                        columns: response,
                        type: 'donut',
                        onclick: function (d, i) {
                        },
                        onmouseover: function (d, i) {
                        },
                        onmouseout: function (d, i) {
                        }
                    },
                    donut: {
                        title: "Alimentos"
                    },
                    color: {
                        pattern: ['#bdca54', '#744034', '#ffc107', '#60B044', '#80653a', '#54ca7b', '#6c2c2c'], // the three color levels for the percentage values.
            
                    },
                    size: {
                        height: 250
                    }
                });
            }else{
                html="<h3 style='color:black;'>No hay gráficos disponibles</h3>"
                $("#donut").append(html);
            }
            

        }
    });


    

})

