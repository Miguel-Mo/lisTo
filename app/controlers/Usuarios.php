<?php

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

    // public function nuevoUsuario()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $array = [];

    //         foreach ($_POST['form'] as $name => $value) {
    //             if ($value['name'] == 'password') {
    //                 $array['clave'] = "'".password_hash($value['value'], PASSWORD_DEFAULT)."'";
    //             } else {
    //                 $array[$value['name']] = "'".$value['value']."'";
    //             }
    //         }

    //         $datos = [];
    //         $datos['keys'] = implode(',', array_keys($array));
    //         $datos['values'] = implode(',', array_values($array));

    //         return $this->modeloUsuarios->nuevoUsuario($datos);
    //     }
    // }

    public function nuevoUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idUsuario';
            $tabla = 'usuarios';
            $where = '';
            return $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where = '');
        }
    }

    // public function editarUsuario()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $array = [];
    //         $id = '';

    //         foreach ($_POST['form'] as $name => $value) {
    //             if ($value['name'] == 'idUsuario') {
    //                 $id = "'".$value['value']."'";
    //             } elseif ($value['name'] == 'clave' && !empty($value['value'])) {
    //                 $array['clave'] = "'".password_hash($value['value'], PASSWORD_DEFAULT)."'";
    //             } else {
    //                 $array[$value['name']] = "'".$value['value']."'";
    //             }
    //         }

    //         $pairs = [];

    //         foreach ($array as $key => $value) {
    //             $pairs[] = $key.'='.$value;
    //         }

    //         $datos = implode(',', $pairs);

    //         // var_dump($datos);
    //         $this->modeloUsuarios->editarUsuario($id, $datos);
    //     }
    // }

    public function editarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [];
            parse_str($_POST['form'], $datos);
            $pk = 'idUsuario';
            $tabla = 'usuarios';
            $where = ' where idUsuario='.$datos['idUsuario'];

            return $this->modeloBBDD->updateBBDD($datos, $tabla, $pk, $where);
        }
    }

    public function borrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            if ($id != '1') {
                echo $this->modeloUsuarios->borrarUsuarioById($id);
            }
        }
    }

    public function obtenerUsuariosAsignadosAEvento()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            echo json_encode($this->modeloUsuarios->obtenerUsuariosAsignadosAEvento($id));
        }
    }

    public function insertUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $_POST;
            $pk = 'idUsuario';
            $tabla = 'usuarios';
            $where = '';
            $this->modeloBBDD->insertBBDD($datos, $tabla, $pk, $where = '');
        }
        redireccionar('/Usuarios');
    }

    public function deleteUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pk = 'idUsuario';
            $tabla = 'usuarios';
            $where = ' where idUsuario='.$_POST['id'];

            return $this->modeloBBDD->deleteBBDD($tabla, $pk, $where);
        }
    }
}
