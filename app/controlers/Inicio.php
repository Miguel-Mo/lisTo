<?php

class Inicio extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloInicio = $this->modelo('modeloInicio');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['rol'] != 1) {
            // $centro = $_SESSION['centro'];

            // redirecciono a la lista de empleados del centro
            $this->vista('inicio/inicio', "");
            die;
        }
        ////$clientes = $this->clienteModelo->clientes();
        $datos = [
           // 'nombre_clase' => get_class(),
           // 'submenu' => $this->submenu
        ];
        $this->vista('inicio/inicio', $datos);
    }

    public function obtenerDatosDonut(){
        $resultado=$this->modeloInicio->obtenerDatosDonut();
        $resultadoFormated=[];

        for ($i=0; $i <count($resultado) ; $i++) { 
            $resultadoFormated[]=[$resultado[$i]->nombre,$resultado[$i]->contador];
        }
        echo json_encode($resultadoFormated);
    }

    public function obtenerDatosGauge(){
        $resultado=$this->modeloInicio->obtenerDatosGauge();
        $resultadoFormated=[];

        for ($i=0; $i <count($resultado) ; $i++) { 
            $resultadoFormated[]=[$resultado[$i]->nombre,$resultado[$i]->contador];
        }
        echo json_encode($resultadoFormated);
    }
}
