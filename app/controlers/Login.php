<?php

class Login extends Controlador
{
    public function __construct()
    {
        $this->modeloLogin = $this->modelo('modeloLogin');
        $this->modeloCentros = $this->modelo('modeloCentros');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        // Si la sesion esta iniciada que vuelva al inicio correspondiente
        if (isset($_SESSION['token_control']) && !empty($_SESSION['token_control']) && $_SESSION['token_control'] == 1) {
            // ya sea un empleado o lo que sea siempre va redirigir a la pagina de centros si no es un admin
            if ($_SESSION['rol'] ==2) {
                $centro = $_SESSION['centro'];
                // redirecciono a la lista de empleados del centro
                redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            } else {
                redireccionar('/Inicio');
            }
            die;
        }

        $datos = [
            'usuarios_centros' => $this->modeloLogin->obtenerUsuariosRol(2),
        ];
        $this->vista('login/login', $datos);
    }

    public function acceder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mail = trim($_POST['mail']);
            $pass = trim($_POST['pass']);

            $usuario = $this->modeloLogin->obtenerUsuarioMail($mail);

            //if ($usuario->mailUsuario == $mail && password_verify($pass, $usuario->pass)) {
            if ($usuario->emailUsuario == $mail && $pass == $usuario->pass) {
                $validacion = true;
                if (!isset($_SESSION)) {
                    session_start();
                }
                foreach ($usuario as $key => $val) {
                    if ($key != 'pass') {
                        $_SESSION[$key] = $val;
                    }
                }
                //$_SESSION["timeout"] = time();
                //$_SESSION["duracion"] = 30000; // duracion de la session en segundos - al finalizar el tiempo no te redirige al login
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

    public function accederCentro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mail = trim($_POST['mail']);
            $pass = trim($_POST['pass']);

            $usuario = $this->modeloLogin->obtenerUsuarioMail($mail);

            //if ($usuario->mailUsuario == $mail && password_verify($pass, $usuario->pass)) {
            if ($usuario->emailUsuario == $mail && $pass == $usuario->pass) {
                $validacion = true;
                if (!isset($_SESSION)) {
                    session_start();
                }
                foreach ($usuario as $key => $val) {
                    if ($key != 'pass') {
                        $_SESSION[$key] = $val;
                    }
                }
                //$_SESSION["timeout"] = time();
                //$_SESSION["duracion"] = 30000; // duracion de la session en segundos - al finalizar el tiempo no te redirige al login
                $_SESSION['usuario'] = $validacion;
                $_SESSION['token_control'] = 1;

                // guardamos el rol y el usuario
                $_SESSION['rol'] = $usuario->idRolUsuario;
                $_SESSION['usuario_logged'] = $usuario;

                // cojo el centro correspondiente y lo guardamos tambien en la sesion
                $centro = $this->modeloCentros->obtenerCentroPorUsuario($usuario->idUsuario);
                $_SESSION['centro'] = $centro;

                // redirecciono a la lista de empleados del centro
                redireccionar('/Empleados/EmpleadosCentro/'.$centro->idCentro);
            } else {
                $validacion = false;
                self::vaciar();
            }
        } else {
            self::vaciar();
        }
    }

    public function vaciar()
    {
        session_start();
        session_unset();
        session_destroy();
        if (headers_sent()) {
            return '<script>window.location.href='.RUTA_URL.'</script>';
        } else {
            redireccionar('/Login');
        }
    }
}
