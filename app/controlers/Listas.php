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

  
}
