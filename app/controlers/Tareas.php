<?php

class Tareas extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloTareas = $this->modelo('modeloTareas');
        $this->modeloTareasEmpleado = $this->modelo('modeloTareasEmpleado');
        $this->modeloEmpleados = $this->modelo('modeloEmpleados');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin
        if ($_SESSION['rol'] != 1) {
            $centro = $_SESSION['centro'];

            // redirecciono a la lista de empleados del centro
            redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            die;
        }

        $datos = [
           'tareas_personas' => $this->modeloTareasEmpleado->obtenerTareasEmpleados(),
           'tareas' => $this->modeloTareas->obtenerTareas(),
           'empleados' => $this->modeloEmpleados->obtenerEmpleados(),
        ];
        $this->vista('tareas/tareas', $datos);
    }

    public function obtenerTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloTareas->obtenerTarea($_POST['id']));
        }
    }

    public function nuevaTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idTarea';
            $tabla = 'tareas';
            $where = '';

            return $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function editarTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idTarea';
            $tabla = 'tareas';
            $where = ' where idTarea='.$datos['idTarea'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $datos = [];
            // parse_str($_POST['form'], $datos);
            $pk = 'idTarea';
            $tabla = 'tareas';
            $where = ' where idTarea='.$_POST['id'];

            echo $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }
}
