<?php

class Alimentos extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloAlimentos = $this->modelo('modeloAlimentos');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $datos = [
            //    'alimentos' => $this->modeloAlimentos->obtenerAlimentos(),
        ];
        $this->vista('alimentos/alimentos', $datos);
    }

    public function obtenerTiposAlimento()
    {
        $tipos = $this->modeloAlimentos->obtenerTiposAlimento();
        $unidades = $this->modeloAlimentos->obtenerUnidadesAlimento();
        $resultado = [
            'tipos' => $tipos,
            'unidades' =>  $unidades,
        ];

        echo json_encode($resultado);
    }

    public function addNuevoAlimento()
    {
        $this->modeloAlimentos->insertNuevoAlimento($_POST);

        redireccionar('/Alimentos');
    }

    public function obtenerTodosAlimentos()
    {
        $defecto = $this->modeloAlimentos->obtenerAlimentosDefecto();
        $resultado = [
            'Xdefecto' => $defecto,
        ];
        echo json_encode($resultado);
    }


    public function obtenerFiltroAlimentos(){
        $defecto = $this->modeloAlimentos->obtenerAlimentosDefectoFiltro($_POST);
        $resultado = [
            'Xdefecto' => $defecto,
        ];
        echo json_encode($resultado);
    }
    public function eliminarAlimento(){
        $this->modeloAlimentos->eliminarAlimentoRecetaById($_POST['id']);
        $resultado=$this->modeloAlimentos->eliminarAlimentoById($_POST['id']);
        echo $resultado;
    }

    public function obtenerTiposyAlimentosRecetas()
    {
        $defecto = $this->modeloAlimentos->obtenerAlimentosDefecto();
        $unidades = $this->modeloAlimentos->obtenerUnidadesAlimento();
        $resultado = [
            'defecto' => $defecto,
            'unidades' =>  $unidades,
        ];

        echo json_encode($resultado);
    }
}
