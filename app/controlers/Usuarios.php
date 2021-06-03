<?php
/**
 * Clase usuarios para amplicacion en un futurio modulo de configuracion
 * ahora no es util ni se utiliza
 */
class Usuarios extends Controlador
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
    }

    public function index()
    {
        $datos = [];
        $this->vista('usuarios/usuarios', $datos);
    }

    public function obtenerUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->modeloUsuarios->obtenerUsuarioId($_POST['id']));
        }
    }
}
