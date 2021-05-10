<?php

class Inicio extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        //$this->clienteModelo = $this->modelo('modeloInicio');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin
        if ($_SESSION['rol'] != 1) {
            $centro = $_SESSION['centro'];

            // redirecciono a la lista de empleados del centro
            redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            die;
        }
        ////$clientes = $this->clienteModelo->clientes();
        $datos = [
           // 'nombre_clase' => get_class(),
           // 'submenu' => $this->submenu
        ];
        $this->vista('inicio/inicio', $datos);
    }
}
