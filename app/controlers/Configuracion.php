<?php

/**
 * Clase para ampliación de cara a una posible incorporación
 * de rol Administrador o una posible ampliación con una vista de 
 * configuración
 */
class Configuracion extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $datos = [
           'usuarios' => $this->modeloUsuarios->obtenerUsuarios(),
        ];
        $this->vista('configuracion/configuracion', $datos);
    }
}
