<?php

class Session
{

    // PARA UN FUTURO SINGLETON

    // public static function getInstance()
    // {
    //     if (!self::$instance instanceof self) {
    //         self::$instance = new self();
    //     }

    //     return self::$instance;
    // }

    public static function has_valid_attributes()
    {
        if (!empty($_SESSION) &&
            isset($_SESSION['usuario']) &&
            isset($_SESSION['token_control']) &&
            isset($_SESSION['idUsuario']) &&
            isset($_SESSION['idRolUsuario'])) {
            return true;
        }

        return false;
    }

    // public function has_started()
    // {
    //     if (!empty($_SESSION)) {
    //         return true;
    //     }

    //     return false;
    // }
}
