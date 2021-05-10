<?php

class Zonas extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloZonas = $this->modelo('modeloZonas');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        //$clientes = $this->clienteModelo->clientes();
        $datos = [
           // 'nombre_clase' => get_class(),
           // 'submenu' => $this->submenu
        ];
        $this->vista('zonas/zonas', $datos);
    }

    public function obtenerZona()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloZonas->obtenerZona($_POST['id']));
        }
    }

    public function nuevaZona()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idZona';
            $tabla = 'zonas';
            $where = '';

            return $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function editarZona()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idZona';
            $tabla = 'zonas';
            $where = ' where idZona='.$datos['idZona'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarZona()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $datos = [];
            // parse_str($_POST['form'], $datos);
            $pk = 'idZona';
            $tabla = 'zonas';
            $where = ' where idZona='.$_POST['id'];

            echo $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }
}
