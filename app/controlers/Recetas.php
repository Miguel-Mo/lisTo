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

        $datos = [];
        $this->vista('recetas/recetas', $datos);
    }



    public function addNuevoReceta()
    {
        $idReceta = $this->modeloRecetas->insertNuevaReceta($_POST);

        for ($i = 0; $i < count($_POST['ingredienteReceta']); $i++) {
            $this->modeloRecetas->insertAlimentoReceta($_POST['ingredienteReceta'][$i], $_POST['cantidadReceta'][$i], $_POST['unidadMedidaReceta'][$i], $idReceta);
        }
        redireccionar('/Recetas');
    }

    public function editNuevoReceta()
    {
        $this->modeloRecetas->updateReceta($_POST);
        $this->modeloRecetas->eliminarAlimentosReceta($_POST['idRecetaEdit']);

        for ($i = 0; $i < count($_POST['ingredienteReceta']); $i++) {
            $this->modeloRecetas->insertAlimentoReceta($_POST['ingredienteReceta'][$i], $_POST['cantidadReceta'][$i], $_POST['unidadMedidaReceta'][$i], $_POST['idRecetaEdit']);
        }
        redireccionar('/Recetas');
    }

    public function obtenerTodasRecetas()
    {
        $resultado = $this->modeloRecetas->obtenerTodasRecetas();
        echo json_encode($resultado);
    }

    public function obtenerAlimentosRecetas()
    {
        $idReceta = $_POST['idReceta'];
        $resultado = $this->modeloRecetas->obtenerAlimentosRecetas($idReceta);
        echo json_encode($resultado);
    }


    public function eliminarReceta()
    {
        $resultado = $this->modeloRecetas->eliminarRecetaById($_POST['id']);
        echo $resultado;
    }

    public function obtenerFiltroRecetas()
    {
        $resultado = $this->modeloRecetas->obtenerRecetasFiltro($_POST);
        echo json_encode($resultado);
    }

    public function obtenerRecetaIndividual()
    {
        $receta = $this->modeloRecetas->obtenerRecetaIndividual($_POST['id']);
        if($receta->tiempo=="15 minutos"){
            $receta->tiempo=1;
        }else if($receta->tiempo=="30 minutos"){
            $receta->tiempo=2;
        }else if($receta->tiempo=="45 minutos"){
            $receta->tiempo=3;
        }else if($receta->tiempo=="1 hora"){
            $receta->tiempo=4;
        }else if($receta->tiempo=="1 hora y media"){
            $receta->tiempo=5;
        }else if($receta->tiempo=="2 horas"){
            $receta->tiempo=6;
        };
        $alimentos=$this->modeloRecetas->obtenerAlimentosRecetasEditar($_POST['id']);
        $resultado=[
            'receta'=>$receta,
            'alimentos'=>$alimentos
        ];
        echo json_encode($resultado);

    }
}
