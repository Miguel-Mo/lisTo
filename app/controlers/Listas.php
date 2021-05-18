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
        $datos = [
           
        ];
        $this->vista('listas/listas', $datos);
    }

    public function insertRecetasToListaTemporal(){
        $this->modeloListas->insertRecetasToListaTemporal($_POST['idReceta']);
    }

    public function traerListaTemporal(){
        $resultado=$this->modeloListas->traerListaTemporal();
        echo json_encode($resultado);
    }  

    public function eliminarRecetasListaTemporal(){
        $this->modeloListas->eliminarRecetasListaTemporal($_POST['idEliminar']);
    }
}
