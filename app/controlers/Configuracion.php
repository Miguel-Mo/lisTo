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

        $datos = [
           'usuarios' => $this->modeloUsuarios->obtenerUsuarios(),
           'zonas' => $this->modeloZonas->obtenerZonas(),
           'tareas_tipos' => $this->modeloTiposTarea->obtenerTiposTarea(),
        ];
        $this->vista('configuracion/configuracion', $datos);
    }
}
