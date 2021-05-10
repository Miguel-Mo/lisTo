<?php

class Empleados extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
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
        //$clientes = $this->clienteModelo->clientes();
        $datos = [
            'empleados' => $this->modeloEmpleados->obtenerEmpleados(),
        ];
        $this->vista('empleados/empleados', $datos);
    }

    public function EmpleadosCentro($idCentro)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin
        if ($_SESSION['rol'] != 1 && $_SESSION['centro']->idCentro != $idCentro) {
            $centro = $_SESSION['centro'];

            // redirecciono a la lista de empleados del centro
            redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            die;
        }

        $datos = [
           'empleados' => $this->modeloEmpleados->obtenerEmpleadosCentro($idCentro),
        ];
        $this->vista('empleados/empleados', $datos);
    }

    public function obtenerEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloEmpleados->obtenerEmpleado($_POST['id']));
        }
    }

    public function nuevoEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idPersona';
            $tabla = 'personas';
            $where = '';

            return $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function editarEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idPersona';
            $tabla = 'personas';
            $where = ' where idPersona='.$datos['idPersona'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $datos = [];
            // parse_str($_POST['form'], $datos);
            $pk = 'idPersona';
            $tabla = 'personas';
            $where = ' where idPersona='.$_POST['id'];

            echo $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }
}
