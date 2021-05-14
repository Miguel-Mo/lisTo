<?php

class TareasEmpleado extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloTareas = $this->modelo('modeloTareas');
        $this->modeloTareasEmpleado = $this->modelo('modeloTareasEmpleado');
        $this->modeloTareasPausas = $this->modelo('modeloTareasPausas');
        $this->modeloEmpleados = $this->modelo('modeloEmpleados');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index($idPersona = '')
    {
        // si tuvieramos mas tiempo igual se podria mejorar BUT...
        if (!isset($_SESSION)) {
            session_start();
        }
        // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin

        if (empty($idPersona)) {
           
                redireccionar('/Inicio');
           
            die;
        } else {
            // buscar la persona a ver si pertenece al centro logueado
            if (!is_nan($idPersona)) {
                $persona = $this->modeloEmpleados->obtenerEmpleado($idPersona);
                $centro = null;
                if (isset($_SESSION['centro']) && !empty($_SESSION['centro'])) {
                    $centro = $_SESSION['centro'];
                }
                if (!empty($persona) && ($_SESSION['rol'] == 1 || $persona->idCentroPersona == $centro->idCentro)) {
                    $datos = [
                        'empleado' => $persona,
                        'tareas_empleado' => $this->modeloTareasEmpleado->obtenerTareasEmpleadoHoy($idPersona),
                     ];
                    $this->vista('tareasEmpleado/tareasEmpleado', $datos);
                } else {
                    if ($_SESSION['rol'] != 1) {
                        $centro = $_SESSION['centro'];

                        // redirecciono a la lista de empleados del centro
                        redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
                    } else {
                        redireccionar('/Inicio');
                    }
                }
                die;
            } else {
                if ($_SESSION['rol'] != 1) {
                    $centro = $_SESSION['centro'];

                } else {
                    redireccionar('/Inicio');
                }
                die;
            }
        }
    }

    public function verTodasTareas($idPersona)
    {// si tuvieramos mas tiempo igual se podria mejorar BUT...
        if (!isset($_SESSION)) {
            session_start();
        }
        // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin

        if (empty($idPersona)) {
            if ($_SESSION['rol'] != 1) {
                $centro = $_SESSION['centro'];

                // redirecciono a la lista de empleados del centro
            } else {
                redireccionar('/Inicio');
            }
            die;
        } else {
            // buscar la persona a ver si pertenece al centro logueado
            if (!is_nan($idPersona)) {
                $persona = $this->modeloEmpleados->obtenerEmpleado($idPersona);
                $centro = null;
                if (isset($_SESSION['centro']) && !empty($_SESSION['centro'])) {
                    $centro = $_SESSION['centro'];
                }
                if (!empty($persona) && ($_SESSION['rol'] == 1 || $persona->idCentroPersona == $centro->idCentro)) {
                    $datos = [
                        'empleado' => $persona,
                        'tareas_empleado' => $this->modeloTareasEmpleado->obtenerTareasEmpleado($idPersona),
                     ];
                    $this->vista('tareasEmpleado/tareasEmpleado', $datos);
                } else {
                    if ($_SESSION['rol'] != 1) {
                        $centro = $_SESSION['centro'];

                        // redirecciono a la lista de empleados del centro
                        redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
                    } else {
                        redireccionar('/Inicio');
                    }
                }
                die;
            } else {
                if ($_SESSION['rol'] != 1) {
                    $centro = $_SESSION['centro'];

                    // redirecciono a la lista de empleados del centro
                    redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
                } else {
                    redireccionar('/Inicio');
                }
                die;
            }
        }
    }

    public function obtenerTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloTareas->obtenerTarea($_POST['id']));
        }
    }


    public function obtenerTareaPersona()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloTareas->obtenerTareaPersona($_POST['id']));
        }
    }

    public function nuevaTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            // echo '<pre>';
            // print_r($_POST['form']);
            // print_r($datos);
            // echo '</pre>';
            // die;
            $fechaInicio = strtotime($datos['fechaTarea']);
            $fechaFin = ($datos['fechaLimiteRepeticion']) ? strtotime($datos['fechaLimiteRepeticion']) : strtotime($datos['fechaTarea']);
            $diaSemana = date('N', strtotime($datos['fechaTarea']));
            $diaMes = date('d', strtotime($datos['fechaTarea']));
            if ($datos['repeticion'] == 'no') {
                $incremento = 86400;
                $dias = [];
            }
            if ($datos['repeticion'] == 'diaria') {
                $incremento = 86400;
                $dias = [1, 2, 3, 4, 5, 6, 7];
            }
            if ($datos['repeticion'] == 'LV') {
                $incremento = 86400;
                $dias = [1, 2, 3, 4, 5];
            }
            if ($datos['repeticion'] == 'LS') {
                $incremento = 86400;
                $dias = [1, 2, 3, 4, 5, 6];
            }
            if ($datos['repeticion'] == 'semanal') {
                $incremento = 86400;
                $dias = [date('N', $fechaInicio)];
            }
            // if($datos['repeticion']=='mensual'){
            //     $incremento=86400;
            //     $dias=[];
            // }
            // if($datos['repeticion']=='anual'){
            //     $incremento=86400*365;
            //     $dias=[];
            // }
            $fechasTarea = [];
            //Recorro las fechas y con la función strotime obtengo los lunes
            for ($i = $fechaInicio; $i <= $fechaFin; $i += $incremento) {
                //Sacar el dia de la semana con el modificador N de la funcion date
                $dia = date('N', $i);
                if (in_array($dia, $dias)) {
                    $fechasTarea[] = date('Y-m-d', $i);
                } elseif (count($dias) == 0 && $fechaFin <= $i) {
                    $fechasTarea[] = date('Y-m-d', $i);
                }
            }
            for ($p = 0; $p < count($datos['idPersona']); ++$p) {
                for ($f = 0; $f < count($fechasTarea); ++$f) {
                    $datosEvento = [
                        'idTarea' => $datos['idTarea'],
                        'idPersona' => $datos['idPersona'][$p],
                        'fechaTarea' => $fechasTarea[$f],
                        'horaLimite' => $datos['horaLimite'],
                    ];
                    $pk = 'idTareaPersona';
                    $tabla = 'tareas_persona';
                    $where = '';
                    $idTareaPersona = $this->modeloBBDD->insertBBDD($datosEvento, $tabla, $pk, $where);
                }
            }
        }
    }

    public function editarTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idTareaPersona';
            $tabla = 'tareas_persona';
            $where = ' where idTareaPersona='.$datos['idTareaPersona'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $datos = [];
            // parse_str($_POST['form'], $datos);
            $pk = 'idTareaPersona';
            $tabla = 'tareas_persona';
            $where = ' where idTareaPersona='.$_POST['id'];

            echo $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }

    public function registrarInicioTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idTarea = intval($_POST['id']);
            if (!empty($idTarea) && !is_nan($idTarea)) {
                $tarea = $this->modeloTareasEmpleado->obtenerTareaEmpleado($idTarea);
                if (!empty($tarea) && (is_null($tarea->inicioTarea) || empty($tarea->inicioTarea))) {
                    $res = $this->modeloTareasEmpleado->registrarInicioTarea($idTarea);
                    if ($res == 1) {
                        echo json_encode(['status' => 1]);
                    } else {
                        echo json_encode(['status' => -1, 'error' => 'No se pudo realizar la operación.']);
                    }
                } else {
                    echo json_encode(['status' => -1, 'error' => 'La tarea no existe o ya ha sido iniciada.']);
                }
            } else {
                echo json_encode(['status' => -1, 'error' => 'Id nulo.']);
            }
        }
    }

    public function registrarFinTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idTarea = intval($_POST['id']);
            if (!empty($idTarea) && !is_nan($idTarea)) {
                $tarea = $this->modeloTareasEmpleado->obtenerTareaEmpleado($idTarea);
                if (!empty($tarea) &&
                        (!is_null($tarea->inicioTarea) || !empty($tarea->inicioTarea)) &&
                        (is_null($tarea->finTarea) || empty($tarea->finTarea))) {
                    $res = $this->modeloTareasEmpleado->registrarFinTarea($idTarea);
                    if ($res == 1) {
                        echo json_encode(['status' => 1]);
                    } else {
                        echo json_encode(['status' => -1, 'error' => 'No se pudo realizar la operación.']);
                    }
                } else {
                    echo json_encode(['status' => -1, 'error' => 'La tarea no existe o ya ha sido completada.']);
                }
            } else {
                echo json_encode(['status' => -1, 'error' => 'Id nulo.']);
            }
        }
    }

    public function registrarInicioPausa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idTarea = intval($_POST['id']);
            if (!empty($idTarea) && !is_nan($idTarea)) {
                $tarea = $this->modeloTareasEmpleado->obtenerTareaEmpleado($idTarea);
                if (!empty($tarea) &&
                        (!is_null($tarea->inicioTarea) || !empty($tarea->inicioTarea)) &&
                        (is_null($tarea->finTarea) || empty($tarea->finTarea))) {
                    $res = $this->modeloTareasPausas->registrarInicioPausa($idTarea);
                    if ($res == 1) {
                        $idPausa = $this->modeloTareasPausas->obtenerIdUltimaPausa($idTarea)->id;
                        $this->modeloTareasEmpleado->marcarComoPausada($idTarea, $idPausa);
                        echo json_encode(['status' => 1, 'idPausa' => $idPausa]);
                    } else {
                        echo json_encode(['status' => -1, 'error' => 'No se pudo realizar la operación.']);
                    }
                } else {
                    echo json_encode(['status' => -1, 'error' => 'La tarea no existe o ya se ha empezado o no se ha terminado.']);
                }
            } else {
                echo json_encode(['status' => -1, 'error' => 'Id nulo.']);
            }
        }
    }

    public function registrarFinPausa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idPausa = intval($_POST['id']);

            if (!empty($idPausa) && !is_nan($idPausa)) {
                $pausa = $this->modeloTareasPausas->obtenerPausaTarea($idPausa);
                if (!empty($pausa) && (!is_null($pausa->inicioPausa) || !empty($pausa->inicioPausa))) {
                    $res = $this->modeloTareasPausas->registrarFinPausa($idPausa);
                    if ($res == 1) {
                        $this->modeloTareasEmpleado->marcarComoPausada($pausa->idTareaPersona);
                        echo json_encode(['status' => 1]);
                    } else {
                        echo json_encode(['status' => -1, 'error' => 'No se pudo realizar la operación.']);
                    }
                } else {
                    echo json_encode(['status' => -1, 'error' => 'La pausa no existe o no ha sido empezada.']);
                }
            } else {
                echo json_encode(['status' => -1, 'error' => 'Id nulo.']);
            }
        }
    }
}