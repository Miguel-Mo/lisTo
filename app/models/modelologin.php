<?php

class modeloLogin {

    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function obtenerUsuariosRol($idRol){
        $this->db->query('SELECT r.*,nombreUsuario,emailUsuario,idUsuario FROM usuarios
        LEFT JOIN roles r on r.idRol=usuarios.idRolUsuario where r.idRol='.$idRol);

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function comprobarLogin($mail, $pass) {
        /*
        $this->db->query('SELECT * FROM usuarios WHERE mail = :mail AND password = :pass');
        $this->db->bind(':mail', $mail);
        $this->db->bind(':pass', $pass);

        $fila = $this->db->registro();

        return $fila;
        */
//          Ahora trabajamos con un array, en producción lo haremos con una tabla de la base de datos
        $usuarios = ["test@data.es", "test", "Test"];

        if (in_array($mail, $usuarios) && in_array($pass, $usuarios)) {
            return $usuarios[2];
        } else {
            return 0;
        }
    }

    public function obtenerUsuarioMail($mail){
        $this->db->query('SELECT 
        usu.idUsuario as idUsuario,
        usu.nombreUsuario as nombreUsuario,
        usu.emailUsuario as emailUsuario,
        usu.idRolUsuario as idRolUsuario,
        usu.password as pass,
        rol.nombreRol as rolUsuario,
        rol.colorRol as rolColor,
        rol.nivelAccesoRol as nivelAccesoRol
        FROM usuarios usu 
        LEFT JOIN roles rol ON usu.idRolUsuario = rol.idRol 
        WHERE emailUsuario = :emailUsuario;');
        $this->db->bind(':emailUsuario', $mail);        
        $fila = $this->db->registro();                
        return $fila;
    }

}
