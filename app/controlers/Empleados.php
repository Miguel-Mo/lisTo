<?php

class Empleados extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloEmpleados = $this->modelo('modeloEmpleados');
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
        $this->vista('empleados/empleados', $datos);
    }

  
}
