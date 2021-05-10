<?php

class Tareas extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloTareas = $this->modelo('modeloTareas');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $datos = [
        //    'alimentos' => $this->modeloTareas->obtenerAlimentos(),
        ];
        $this->vista('tareas/tareas', $datos);
    }

    public function obtenerTiposAlimento()
    {
        echo  $this->modeloTareas->obtenerTiposAlimento();
        
    }

    public function obtenerUnidadesAlimento()
    {
        echo $this->modeloTareas->obtenerUnidadesAlimento();
    }

 
}
