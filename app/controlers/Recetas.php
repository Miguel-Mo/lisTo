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

 
}
