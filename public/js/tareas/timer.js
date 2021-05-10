$(document).ready(function () {

    /**
     * posibles estados de una tarea
     * 
     * no empezada -> empezada -> terminada
     *                  v   ^
     *                 pausada
     */

    let play = $(".acciones-tarea .empezar-tarea")
    let pause = $(".acciones-tarea .pausar-tarea")
    let complete = $(".acciones-tarea .completar-tarea")

    play.on("click", function (e) {
        let buttons = {
            parent: $(this).parent(),
            play: $(this),
            pause: $(this).siblings(".pausar-tarea"),
            complete: $(this).siblings(".completar-tarea"),
            this: $(this),
        }

        let idTarea = $(this).attr("data-id")
        let is_paused = parseInt(buttons.parent.attr("data-is_paused"))

        if (isNaN(is_paused) || is_paused === 1) {
            if (isNaN(is_paused)) {
                iniciarTarea(idTarea, buttons)
            } else {
                idPausa = parseInt(buttons.parent.attr("data-id_pausa"))
                continuarTarea(idPausa, buttons)
            }
        } else {
            pausarTarea(idTarea, buttons)
        }
    });

    pause.on("click", function (e) {
        let buttons = {
            parent: $(this).parent(),
            play: $(this).siblings(".empezar-tarea"),
            pause: $(this),
            complete: $(this).siblings(".completar-tarea"),
            this: $(this),
        }

        let idTarea = $(this).attr("data-id")

        pausarTarea(idTarea, buttons)
    });

    complete.on("click", function (e) {
        let buttons = {
            parent: $(this).parent(),
            play: $(this).siblings(".empezar-tarea"),
            pause: $(this).siblings(".pausar-tarea"),
            complete: $(this),
            this: $(this),
        }

        let idTarea = $(this).attr("data-id")

        completarTarea(idTarea, buttons)
    });
});

/**
 * @param {*} boton boton jquery (play, pause, complete)
 * @param {*} estado estado de la tarea. 0 -> pendiente, 1 -> en proceso, 2 -> pausado, 3 -> terminado  
 */
function setEstadoTarea(boton, estado) {
    $estado = boton.parent().siblings(".estado-tarea").find(".badge")
    switch (estado) {
        case 0:
            $estado.text("Pendiente")
            $estado.removeClass()
            $estado.addClass("badge badge-secondary")
            break;
        case 1:
            $estado.text("En proceso")
            $estado.removeClass()
            $estado.addClass("badge badge-primary")
            break;
        case 2:
            $estado.text("Pausada")
            $estado.removeClass()
            $estado.addClass("badge badge-warning")
            break;
        case 3:
            $estado.text("Completada")
            $estado.removeClass()
            $estado.addClass("badge badge-success")
            break;

        default:
            break;
    }
}

function iniciarTarea(id, buttons) {
    buttons.this.attr("disabled", true)
    let RUTA_URL = $("#RUTA-URL").val()
    let url = RUTA_URL + "/TareasEmpleado/registrarInicioTarea"

    $.ajax({
        type: "POST",
        url: url,
        data: { id: id },
        success: function (response) {
            try {
                let json = JSON.parse(response)
                console.log(json);
                if (json.status === 1) {
                    buttons.parent.attr("data-is_paused", 0)
                    buttons.play.hide()
                    buttons.pause.show()
                    buttons.complete.show()
                    setEstadoTarea(buttons.this, 1)
                }
                buttons.this.attr("disabled", false)
            } catch (error) {
                console.error("Algo salió mal con la respuesta del servidor", error);
                buttons.this.attr("disabled", false)
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.error("Algo salió mal");
            buttons.this.attr("disabled", false)
        }
    });
}

function completarTarea(id, buttons) {
    buttons.this.attr("disabled", true)
    let RUTA_URL = $("#RUTA-URL").val()
    let url = RUTA_URL + "/TareasEmpleado/registrarFinTarea"

    $.ajax({
        type: "POST",
        url: url,
        data: { id: id },
        success: function (response) {
            try {
                let json = JSON.parse(response)
                console.log(json);

                if (json.status === 1) {
                    buttons.play.hide()
                    buttons.pause.hide()
                    buttons.complete.hide()
                    setEstadoTarea(buttons.this, 3)
                }
                buttons.this.attr("disabled", false)
            } catch (error) {
                console.error("Algo salió mal con la respuesta del servidor", error);
                buttons.this.attr("disabled", false)
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.error("Algo salió mal");
            buttons.this.attr("disabled", false)
        }
    });
}

function pausarTarea(id, buttons) {
    buttons.this.attr("disabled", true)
    let RUTA_URL = $("#RUTA-URL").val()
    let url = RUTA_URL + "/TareasEmpleado/registrarInicioPausa"

    $.ajax({
        type: "POST",
        url: url,
        data: { id: id },
        success: function (response) {
            try {
                let json = JSON.parse(response)
                console.log(json);
                if (json.status == 1) {
                    buttons.parent.attr("data-id_pausa", json.idPausa)
                    buttons.parent.attr("data-is_paused", 1)

                    buttons.play.show()
                    buttons.pause.hide()
                    buttons.complete.show()
                    setEstadoTarea(buttons.this, 2)
                }
                buttons.this.attr("disabled", false)
            } catch (error) {
                console.error("Algo salió mal con la respuesta del servidor", error);
                buttons.this.attr("disabled", false)
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.error("Algo salió mal");
            buttons.this.attr("disabled", false)
        }
    });
}

function continuarTarea(id, buttons) {
    buttons.this.attr("disabled", true)
    let RUTA_URL = $("#RUTA-URL").val()
    let url = RUTA_URL + "/TareasEmpleado/registrarFinPausa"

    $.ajax({
        type: "POST",
        url: url,
        data: { id: id },
        success: function (response) {
            try {
                let json = JSON.parse(response)
                console.log(json);

                if (json.status === 1) {
                    buttons.parent.attr("data-is_paused", 0)
                    buttons.play.hide()
                    buttons.pause.show()
                    buttons.complete.show()
                    setEstadoTarea(buttons.this, 1)
                }
                buttons.this.attr("disabled", false)
            } catch (error) {
                console.error("Algo salió mal con la respuesta del servidor", error);
                buttons.this.attr("disabled", false)
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.error("Algo salió mal");
            buttons.this.attr("disabled", false)
        }
    });
}