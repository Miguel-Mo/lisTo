<?php

class Listas extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloListas = $this->modelo('modeloListas');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        //$clientes = $this->clienteModelo->clientes();
        $datos = [];
        $this->vista('listas/listas', $datos);
    }

    public function insertRecetasToListaTemporal()
    {
        $this->modeloListas->insertRecetasToListaTemporal($_POST['idReceta']);
    }

    public function traerListaTemporal()
    {
        $resultado = $this->modeloListas->traerListaTemporal();
        echo json_encode($resultado);
    }

    public function eliminarItemRecetasListaTemporal()
    {
        $this->modeloListas->eliminarItemRecetasListaTemporal($_POST['idEliminar']);
    }

    public function procesarListaTemporal()
    {
        $arrayAlimentos = [];
        $arrayAlimentos=$this->modeloListas->obtenerAlimentosDesdeTemporal($_POST['arrayListIdsListaTemporal']);
        $this->modeloListas->insertNuevaLista($arrayAlimentos);
        $this->modeloListas->eliminarListaTemporalUsuario();
        echo json_encode(1);
        //TODO LATER AGRUPAR ALIMENTOS CON LA MISMA ID Y LUEGO CONCATENARLOS CON DIFERENTES CANTIDADES

    }

    public function obtenerTodasListas(){
        $resultado = $this->modeloListas->obtenerTodasListas();
        echo json_encode($resultado);
    }

    public function obtenerListaActiva(){
        $resultado = $this->modeloListas->obtenerListaActiva();
        echo json_encode($resultado);
    }

    public function principalLista(){
       $this->modeloListas->principalLista($_POST['id']);
    }

    public function eliminarLista(){
        $resultado=$this->modeloListas->eliminarListaById($_POST['id']);
        echo json_encode($resultado);
     }

    
}
