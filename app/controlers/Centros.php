<?php

class Centros extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloCentros = $this->modelo('modeloCentros');
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
        $this->modeloTareas = $this->modelo('modeloTareas');
        $this->modeloEmpleados = $this->modelo('modeloEmpleados');
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
            //'usuarios'=>$this->modeloUsuarios->obtenerUsuarios(),
            //'tareas'=>$this->modeloTareas->obtenerTareas(),
            'centros' => $this->modeloCentros->obtenerCentrosResumen(),
            //'empleados'=>$this->modeloEmpleados->obtenerEmpleados(),
            //'zonas'=>$this->modeloZonas->obtenerZonas(),
         ];
        $this->vista('centros/centros', $datos);
    }

    public function obtenerCentro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloCentros->obtenerCentro($_POST['id']));
        }
    }

    public function nuevoCentro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idCentro';
            $tabla = 'centros';
            $where = '';
            $idCentro = $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where);

            if ($idCentro >= 1) {
                $datosUsuario = [
                    'nombreUsuario' => $datos['nombreCentro'],
                    'emailUsuario' => $datos['emailAdministracionCentro'],
                    'password' => 1984,
                    'idRolUsuario' => 2,
                ];
                $idUsuario = $this->modeloUsuarios->agregarUsuario($datosUsuario);

                if ($idUsuario >= 1) {
                    return $this->modeloCentros->editarUsuarioCentro($idCentro, $idUsuario);
                }
            }
        }
    }

    public function editarCentro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idCentro';
            $tabla = 'centros';
            $where = ' where idCentro='.$datos['idCentro'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarCentro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $datos = [];
            // parse_str($_POST['form'], $datos);
            $pk = 'idCentro';
            $tabla = 'centros';
            $where = ' where idCentro='.$_POST['id'];

            echo $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }
}
