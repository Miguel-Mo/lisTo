<?php

class Recetas extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloRecetas = $this->modelo('modeloRecetas');
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
        $this->modeloAlimentos = $this->modelo('modeloAlimentos');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
      
        $datos = [
         ];
        $this->vista('recetas/recetas', $datos);
    }



    public function addNuevoReceta(){
        $idReceta=$this->modeloRecetas->insertNuevaReceta($_POST);
        
        for ($i=0; $i < count($_POST['ingredienteReceta']); $i++) { 
            $this->modeloRecetas->insertAlimentoReceta($_POST['ingredienteReceta'][$i],$_POST['cantidadReceta'][$i],$_POST['unidadMedidaReceta'][$i],$idReceta);
        }
        redireccionar('/Recetas');
    }

    public function obtenerTodasRecetas(){
        $resultado = $this->modeloRecetas->obtenerTodasRecetas();
        echo json_encode($resultado);
    }
 
}
