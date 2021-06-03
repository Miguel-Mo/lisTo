<?php

/**
 * Alimentos
 * En el controlador Alimentos tendre un CRUD de esta clase. 
 * También tendré algunos metodos para cargar los alimentos y 
 * poder filtrarlos.
 */
class Alimentos extends Controlador
{
    /**
     * Constructor que nos carga el modelo bbdd y el modeloAlimentos
     * para poder llamarlo durante la clase, también hace un session start 
     * inicializando los valores de session
     */

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloAlimentos = $this->modelo('modeloAlimentos');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    /**
     * Index
     * Nos cargala vista de alimentos
     */
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

    /**
     * obtenerTiposAlimento
     * Obtengo los tipos y unidades de Alimentos para cargarlos en los modales
     */
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

    /**
     * addNuevoAlimento
     * Metodo para insertar un nuevo alimento, luego redirecciono a la vista de Alimentos
     */
    public function addNuevoAlimento()
    {
        $this->modeloAlimentos->insertNuevoAlimento($_POST);

        redireccionar('/Alimentos');
    }

    /**
     * obtenerTodosAlimentos
     * Cargo los alimentos para mostrarlos en pantalla
     */
    public function obtenerTodosAlimentos()
    {
        $defecto = $this->modeloAlimentos->obtenerAlimentosDefecto();
        $resultado = [
            'Xdefecto' => $defecto,
        ];
        echo json_encode($resultado);
    }


    /**obtenerFiltroAlimentos
     * obtengo los alimentos filtrados si he utilizado el filtro
     */
    public function obtenerFiltroAlimentos(){
        $defecto = $this->modeloAlimentos->obtenerAlimentosDefectoFiltro($_POST);
        $resultado = [
            'Xdefecto' => $defecto,
        ];
        echo json_encode($resultado);
    }

    /**
     * eliminarAlimento
     * Elimino el alimento, envio el resultado para en el js
     * gestionar los alerts
     */
    public function eliminarAlimento(){
        $this->modeloAlimentos->eliminarAlimentoRecetaById($_POST['id']);
        $resultado=$this->modeloAlimentos->eliminarAlimentoById($_POST['id']);
        echo $resultado;
    }

    /**
     * obtenerTiposyAlimentosRecetas
     * Este metodo lo llamo desde la vista de recetas para cargar los select, me llevo tanto los alimentos
     * como las unidades disponibles, después devuelvo el resultado al js
     */
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
