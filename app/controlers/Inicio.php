<?php
/**
 * Esta clase de Inicio sirve para cargar la vista de resumen o inicio
 * Aqui se cargarán los datos. La lista principal la llamaremos desde 
 * el js al controlador de listas.
 */
class Inicio extends Controlador
{
        /**
     * Constructor que nos carga el modelo bbdd y el modeloInicio
     * para poder llamarlo durante la clase, también hace un session start 
     * inicializando los valores de session
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloInicio = $this->modelo('modeloInicio');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    /**
     * Index
     * Nos cargala vista de inicio
     */
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['rol'] != 1) {

            $this->vista('inicio/inicio', "");
            die;
        }
        $datos = [
        ];
        $this->vista('inicio/inicio', $datos);
    }

    /**
     * Nos carga el gráfico del donut del inicio
     * Para ello hacemos una llamada al modelo que nos da los datos 
     * y luego los formateamos de la forma adecuada para que la libreria los pueda mostrar
     */
    public function obtenerDatosDonut(){
        $resultado=$this->modeloInicio->obtenerDatosDonut();
        $resultadoFormated=[];

        for ($i=0; $i <count($resultado) ; $i++) { 
            $resultadoFormated[]=[$resultado[$i]->nombre,$resultado[$i]->contador];
        }
        echo json_encode($resultadoFormated);
    }

    /**
     * Nos carga el gráfico del gauge del inicio
     * Para ello hacemos una llamada al modelo que nos da los datos 
     * y luego los formateamos de la forma adecuada para que la libreria los pueda mostrar
     */
    public function obtenerDatosGauge(){
        $resultado=$this->modeloInicio->obtenerDatosGauge();
        $resultadoFormated=[];

        for ($i=0; $i <count($resultado) ; $i++) { 
            $resultadoFormated[]=[$resultado[$i]->nombre,$resultado[$i]->contador];
        }
        echo json_encode($resultadoFormated);
    }
}
