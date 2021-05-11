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
        $tipos = $this->modeloTareas->obtenerTiposAlimento();
        $unidades = $this->modeloTareas->obtenerUnidadesAlimento();
        $resultado = [
            'tipos' => $tipos,
            'unidades' =>  $unidades,
        ];

        echo json_encode($resultado);
    }

    public function addNuevoAlimento()
    {
        $this->modeloTareas->insertNuevoAlimento($_POST);

        redireccionar('/tareas');
    }

    public function obtenerTodosAlimentos()
    {
        $defecto = $this->modeloTareas->obtenerAlimentosDefecto();
        $usuario = $this->modeloTareas->obtenerAlimentosUsuario();
        $resultado = [
            'Xdefecto' => $defecto,
            'Xusuario' =>  $usuario,
        ];
        print_r($resultado);
        die;
        echo json_encode($resultado);
    }
}
