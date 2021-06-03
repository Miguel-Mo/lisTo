<?php

/**
 * Listas
 * En el controlador Listas tendre un CRUD de esta clase. 
 * También tendré algunos metodos para cargar la listas y 
 * poder filtrarlas.
 */
class Listas extends Controlador
{
    /**
     * Constructor que nos carga el modelo bbdd y el modeloListas
     * para poder llamarlo durante la clase, también hace un session start 
     * inicializando los valores de session
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloListas = $this->modelo('modeloListas');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    /**
     * Index
     * Nos cargala vista de listas
     */
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $datos = [];
        $this->vista('listas/listas', $datos);
    }

    /**insertRecetasToListaTemporal
     * Metodo para insertar en la lista temporal no efinitiva
     */
    public function insertRecetasToListaTemporal()
    {
        $this->modeloListas->insertRecetasToListaTemporal($_POST['idReceta']);
        echo json_encode(1);
    }

    /**traerListaTemporal
     * Metodo para cargar la lista temporal
     */
    public function traerListaTemporal()
    {
        $resultado = $this->modeloListas->traerListaTemporal();
        echo json_encode($resultado);
    }

    /**traerBurbujaTemporal
     * Método para cargar el numero de items en la burbuja que aparece
     * en el icono de la lista temporal
     */
    public function traerBurbujaTemporal()
    {
        $resultado = $this->modeloListas->traerBurbujaTemporal();
        echo json_encode($resultado);
    }

    /**eliminarItemRecetasListaTemporal
     * Metodo para eliminar de la lista temporal
     */
    public function eliminarItemRecetasListaTemporal()
    {
        $this->modeloListas->eliminarItemRecetasListaTemporal($_POST['idEliminar']);
        echo json_encode(1);
    }

    /**procesarListaTemporal
     * En este metodo proceso la lista temporal para guardarla de forma adecuada en la BBDD
     * primero me traigo los alimentos y los almaceno en el arrayalimentos
     * luego consigo la ultima id de lista que he añadido
     * elimino la lista temporal dado que ya no es necesaria
     * y por ultimo hago que esta ultima lista que he creado se la principal
     */
    public function procesarListaTemporal()
    {
        $arrayAlimentos = [];
        $arrayAlimentos = $this->modeloListas->obtenerAlimentosDesdeTemporal();
        $idUltima = $this->modeloListas->insertNuevaLista($arrayAlimentos);
        $this->modeloListas->eliminarListaTemporalUsuario();
        $this->modeloListas->principalLista($idUltima);

        echo json_encode(1);
        //TODO LATER AGRUPAR ALIMENTOS CON LA MISMA ID Y LUEGO CONCATENARLOS CON DIFERENTES CANTIDADES

    }

    /**obtenerTodasListas
     * Metodo para cargar las listas
     * en un futuro este metodo servirá para agrupar los alimentos de una forma adecuada en las listas y
     * que se muestren bien
     */

    public function obtenerTodasListas()
    {
        $resultado = $this->modeloListas->obtenerTodasListas();
        echo json_encode($resultado);

        // foreach ($resultados as $resultado) {
        //     $resultado->alimentosJSONFormateados= [];

        //     foreach ($resultado->alimentosJSON as $ali) {
        //         $elementos = $resultado->alimentosJSONFormateados->$ali['nombre'] ?? "";
        //         $linea = "";
        //         if ($elementos != "") {
        //             $linea .= ", ";
        //         }

        //         $elementos .= $linea . $ali->cantidad . " de " . $ali->descripcion;
        //         $resultado->alimentosJSONFormateados->$ali['nombre']=$elementos;
        //     }
        // }

    }

    /**obtenerListaIndividual
     * Aquí obetengo solo una lista
     * lo utilizo para el modal de editar lista
     */
    public function obtenerListaIndividual()
    {
        $resultado = $this->modeloListas->obtenerListaIndividual($_POST['id']);
        echo json_encode($resultado);
    }

    /**obtenerListaActiva
     * Metodo para saber cual es la lista que esta activa
     */
    public function obtenerListaActiva()
    {
        $resultado = $this->modeloListas->obtenerListaActiva();
        echo json_encode($resultado);
    }

    /**principalLista
     * Metodo para hacer principal una lista
     */
    public function principalLista()
    {
        $this->modeloListas->principalLista($_POST['id']);
    }

    /**eliminarLista
     * Metodo para eliminar una lista le devuelvo respuesta all js para controlar alerts
     */
    public function eliminarLista()
    {
        $resultado = $this->modeloListas->eliminarListaById($_POST['id']);
        echo json_encode($resultado);
    }

    /**editListaSave
     * Metodo para editar lista
     * primero elimino la que habia
     * luego inserto la nueva
     * y por ultimo la marco como principal
     */
    public function editListaSave()
    {
        $this->modeloListas->eliminarListaById($_POST['idLista']);
        $idUltima = $this->modeloListas->insertNuevaListaEditada($_POST);
        $this->modeloListas->principalLista($idUltima);
        redireccionar('/Listas');
    }
}
