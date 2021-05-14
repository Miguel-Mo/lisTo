<?php

class Configuracion extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
        // $this->modeloAlimentos = $this->modelo('modeloAlimentos');
        $this->modeloRecetas = $this->modelo('modeloRecetas');
        $this->modeloEmpleados = $this->modelo('modeloEmpleados');
        $this->modeloZonas = $this->modelo('modeloZonas');
        $this->modeloTiposTarea = $this->modelo('modeloTiposTarea');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['rol'] != 1) {
            $centro = $_SESSION['centro'];

            // redirecciono a la lista de empleados del centro
            redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            die;
        }

        $datos = [
           'usuarios' => $this->modeloUsuarios->obtenerUsuarios(),
           'empleados' => $this->modeloEmpleados->obtenerEmpleados(),
           'zonas' => $this->modeloZonas->obtenerZonas(),
           'tareas_tipos' => $this->modeloTiposTarea->obtenerTiposTarea(),
        ];
        $this->vista('configuracion/configuracion', $datos);
    }
}
