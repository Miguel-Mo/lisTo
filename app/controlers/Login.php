<?php
/**
 * Clase login para logear y registrar usuario
 */
class Login extends Controlador
{
    /**
     * constructor para poder llamar a modelo login
     */
    public function __construct()
    {
        $this->modeloLogin = $this->modelo('modeloLogin');
        // $this->modeloRecetas = $this->modelo('modeloRecetas');
    }

    /**
     * index que carga la vista login y si se esta logueado te redirecciona a la vista de inicio
     */
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

    /**
     * Metodo para acceder. Lo que hago es comparar la contraseña y el email que me han enviado con la bbdd
     * Para comprobar contraseñas hago un passwrod verify y php hace su trabajo si es correscto valido la sesion
     * y doy un token control (1) Inicio la sesion y redirecciono  a inicio
     * si no es correcto redirecciono a login con el metodo vaciar
     */
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

    /**
     * metodo para registro de nuevo usuario, primero compruebo que el email que se va a registrar no est en la bbdd
     * si esta no se registra, si no está empiezo el proceso de registro
     */
    public function registroNuevoUsuario()
    {
        parse_str($_POST['form'], $nuevoRegistro);
        $comprueboEmail = $this->modeloLogin->comprobarEmail($nuevoRegistro["mailNuevo"]);
        $comprueboEmail == 1 ? $resultado = $this->modeloLogin->registroNuevoUsuario($nuevoRegistro) : $resultado = 3;
        echo $resultado;
    }


    /**
     * vaciar
     * metodo que nos saca de la aplicacion y nos desloguea destruye la sesion 
     * y nois redirecciona
     */

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
