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
        //TODO LATER AGRUPAR ALIMENTOS CON LA MISMA ID Y LUEGO CONCATENARLOS CON DIFERENTES CANTIDADES
        //TODO INSERTAR ALIMENTOS EN LISTA DE LA COMPRA
        //INSERTARE EL JSON CON NOMBRE DEL ALIMENTO NOMBRE TIPO UNIDAD CANTIDAD PARA MOSTRARLO DIRECTAMENTE TAMBIEN PUEDO ALMACENAR LOS IDS EN EL JSON PARA FACILITAR EL EDITAR MAS TARDE
        //TODO ELIMINAR LISTA TEMPORAL
       
    }
}
