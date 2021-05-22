<?php

class modeloLogin {

    private $db;

    public function __construct() {
        $this->db = new Base;
    }


    public function comprobarLogin($mail, $pass) {
        
        $this->db->query('SELECT * FROM usuarios WHERE mail = :mail AND password = :pass');
        $this->db->bind(':mail', $mail);
        $this->db->bind(':pass', $pass);

        $fila = $this->db->registro();

        return $fila;

        if (in_array($mail, $fila) && in_array($pass, $fila)) {
            return $fila[2];
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

    public function comprobarEmail($mail){
        $this->db->query(" SELECT * FROM usuarios WHERE emailUsuario='$mail'");
        $resultado = $this->db->registro();
        $resultado==false?$resultado=1:$resultado=0;
        return $resultado;
        
    }


    public function registroNuevoUsuario($nuevoRegistro){
        $this->db->query('INSERT INTO usuarios (nombreUsuario, emailUsuario, password,ciudad,idRolUsuario)
        VALUES ("' . $nuevoRegistro["nombreNuevo"] . '", "' . $nuevoRegistro["mailNuevo"] . '", "' . $nuevoRegistro["passNuevo"] . '","' . $nuevoRegistro['direccionNuevo'] . '",1)');
        $resultado=$this->db->execute()==true?1:0;
        return $resultado;
    }


}
