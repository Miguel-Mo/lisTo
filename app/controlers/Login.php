<?php

class Login extends Controlador
{
    public function __construct()
    {
        $this->modeloLogin = $this->modelo('modeloLogin');
        $this->modeloRecetas = $this->modelo('modeloRecetas');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        // Si la sesion esta iniciada que vuelva al inicio correspondiente
        if (isset($_SESSION['token_control']) && !empty($_SESSION['token_control']) && $_SESSION['token_control'] == 1) {
            redireccionar('/Inicio');
            die;
        }

        $datos = [];
        $this->vista('login/login', $datos);
    }

    public function acceder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mail = trim($_POST['mail']);
            $pass = trim($_POST['pass']);
            
            $usuario = $this->modeloLogin->obtenerUsuarioMail($mail);

            if ($usuario->emailUsuario == $mail && password_verify($pass, $usuario->pass)) {
                $validacion = true;
                if (!isset($_SESSION)) {
                    session_start();
                }
                foreach ($usuario as $key => $val) {
                    if ($key != 'pass') {
                        $_SESSION[$key] = $val;
                    }
                }

                $_SESSION['usuario'] = $validacion;
                $_SESSION['token_control'] = 1;

                // guardamos el rol y el usuario
                $_SESSION['rol'] = $usuario->idRolUsuario;
                $_SESSION['usuario_logged'] = $usuario;

                redireccionar('/Inicio');
            } else {
                $validacion = false;
                self::vaciar();
            }
        } else {
            self::vaciar();
        }
    }

    public function registroNuevoUsuario()
    {
        parse_str($_POST['form'], $nuevoRegistro);
        $comprueboEmail = $this->modeloLogin->comprobarEmail($nuevoRegistro["mailNuevo"]);
        $comprueboEmail == 1 ? $resultado = $this->modeloLogin->registroNuevoUsuario($nuevoRegistro) : $resultado = 3;
        echo $resultado;
    }



    public function vaciar()
    {
        session_start();
        session_unset();
        session_destroy();
        if (headers_sent()) {
            return '<script>window.location.href=' . RUTA_URL . '</script>';
        } else {
            redireccionar('/Login');
        }
    }
}
